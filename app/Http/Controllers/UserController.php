<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Exception;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:read-user')->only(['index']);
        // $this->middleware('can:create-user')->only(['store']);
        // $this->middleware('can:update-user')->only(['update']);
        // $this->middleware('can:delete-user')->only(['destroy', 'bulkDestroy']);
        // $this->middleware('can:impersonate-user')->only(['impersonate', 'leaveImpersonate']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $teamId = $request->input('team_id');

        $query = User::with(['roles', 'team'])->latest()
            ->when($search, function (Builder $query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhereHas('roles', fn ($roleQuery) => $roleQuery->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($teamId, function (Builder $query, $teamId) {
                $query->where('team_id', $teamId);
            });

        return Inertia::render('User/Users', [
            'title'   => 'Gestion des Utilisateurs',
            'users'   => $query->paginate($perPage)->withQueryString(),
            'roles'   => Role::select(['id', 'name'])->get(),
            'teams'   => Team::select(['id', 'name'])->get(),
            'filters' => $request->only(['search', 'role', 'team_id', 'per_page']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Laravel gère automatiquement les erreurs de validation et les renvoie à Inertia
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'last_name'     => 'nullable|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users,email',
            'password'      => ['required', Password::defaults()],
            'team_id'       => 'nullable|exists:teams,id',
            'hourly_rate'   => 'nullable|numeric|min:0',
            'position'      => 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:50',
            'contract_type' => 'nullable|string|max:50',
            'hiring_date'   => 'nullable|date',
            'linkedin_url'  => 'nullable|url|max:255',
            'bio'           => 'nullable|string',
            'is_active'     => 'boolean',
            'roles'         => 'nullable|array',
            'roles.*'       => 'exists:roles,name',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // Upload avatar


            // Hachage du mot de passe
            $validated['password'] = Hash::make($validated['password']);
            $validated['is_active'] = $request->boolean('is_active', true);

            // Création de l'utilisateur
            $user = User::create($validated);
             if ($request->hasFile('profile_photo')) {
                $user->addMediaFromRequest('profile_photo')
                    ->toMediaCollection('avatar', 'media'); // <-- Ajout du disque 'media'
            }
            // Synchronisation des rôles
            if ($request->filled('roles')) {
                $user->syncRoles($request->roles);
            }

            DB::commit();
            return back()->with('success', 'Utilisateur créé avec succès.');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Erreur création utilisateur : " . $e->getMessage());
            return back()->with('error', 'Une erreur critique est survenue lors de la création.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'                 => 'required|string|max:255',
            'last_name'            => 'nullable|string|max:255',
            'email'                => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password'             => ['nullable', Password::defaults()],
            'team_id'              => 'nullable|exists:teams,id',
            'hourly_rate'          => 'nullable|numeric|min:0',
            'position'             => 'nullable|string|max:255',
            'phone'                => 'nullable|string|max:50',
            'contract_type'        => 'nullable|string|max:50',
            'hiring_date'          => 'nullable|date',
            'linkedin_url'         => 'nullable|url|max:255',
            'bio'                  => 'nullable|string',
            'is_active'            => 'boolean',
            'roles'                => 'nullable|array',
            'roles.*'              => 'exists:roles,name',
            'profile_photo'        => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'remove_profile_photo' => 'nullable|boolean',
        ]);

        DB::beginTransaction();
        try {
            // Préparation des données (on exclut les champs virtuels ou traités séparément)
            $updateData = collect($validated)->except(['password', 'roles', 'profile_photo', 'remove_profile_photo'])->toArray();

            // Gestion du mot de passe
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->fill($updateData); // Fill other data first

                    if ($request->boolean('remove_profile_photo')) {
                $user->clearMediaCollection('avatar');
            }
            // 2. Remplacement par une nouvelle image
            elseif ($request->hasFile('profile_photo')) {
                // On nettoie l'ancienne image pour éviter les doublons
                $user->clearMediaCollection('avatar');

                // On ajoute la nouvelle image dans la collection 'avatar' SUR LE DISQUE 'media'
                $user->addMediaFromRequest('profile_photo')
                    ->toMediaCollection('avatar', 'media'); // <-- Le 2ème paramètre est le nom du DISQUE
            }
            // Mise à jour du modèle
            $user->save();

            // Synchronisation des rôles
            if ($request->has('roles')) {
                $user->syncRoles($request->roles);
            }

            DB::commit();
            return back()->with('success', 'Utilisateur mis à jour avec succès.');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Erreur mise à jour utilisateur : " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour de l\'utilisateur.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        DB::beginTransaction();
        try {
            $user->clearMediaCollection('avatar'); // Delete associated media
            $user->delete();
            DB::commit();

            return back()->with('success', 'Utilisateur supprimé définitivement.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression.');
        }
    }

    /**
     * Remove multiple resources from storage.
     */
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:users,id',
        ]);

        $ids = $request->input('ids');

        if (in_array(Auth::id(), $ids)) {
            return back()->with('error', 'Opération annulée : vous avez sélectionné votre propre compte.');
        }

        DB::beginTransaction();
        try {
            $users = User::whereIn('id', $ids)->get();
            foreach ($users as $user) {
                $user->clearMediaCollection('avatar'); // Delete associated media
            }
            User::whereIn('id', $ids)->delete();
            DB::commit();

            return back()->with('success', count($ids) . ' utilisateurs supprimés.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression par lot.');
        }
    }

    /**
     * Impersonate the given user.
     */
    public function impersonate(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Vous ne pouvez pas usurper votre propre identité.');
        }

        session(['impersonator_id' => Auth::id()]);
        Auth::login($user);

        return Redirect::route('dashboard')->with('success', 'Vous êtes maintenant connecté en tant que ' . $user->name);
    }

    /**
     * Revert to the original user.
     */
    public function leaveImpersonate()
    {
        if (!session()->has('impersonator_id')) {
            return Redirect::route('dashboard');
        }

        $impersonatorId = session('impersonator_id');
        Auth::login(User::findOrFail($impersonatorId));
        session()->forget('impersonator_id');

        return Redirect::route('user.index')->with('success', 'Vous avez récupéré votre session originale.');
    }
}
