<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class UserController extends Controller
{
    private function getRoleOptions(): array
    {
        return [
            'admin' => 'Administrateur',
            'editor' => 'Éditeur',
            'user' => 'Utilisateur',
            'Directeur exécutif' => 'Directeur exécutif',
            'Admin/As programme' => 'Admin/As programme',
            'Logisticien comptable' => 'Logisticien comptable',
            'Superviseur protection de l’enfant' => 'Superviseur protection de l’enfant',
            'Communication/As log' => 'Communication/As log',
            'Superviseur santé et Genre' => 'Superviseur santé et Genre',
            'Réceptionniste' => 'Réceptionniste',
            'EDUCATION APROJED' => 'EDUCATION APROJED',
            'Directeur des écoles' => 'Directeur des écoles',
            'Gestionnaire comptable' => 'Gestionnaire comptable',
            'CRSclaire Aprojed' => 'CRSclaire Aprojed',
            'CENTRE D’APPRENTISSAGE PROFETIONNEL (CAP)' => 'CENTRE D’APPRENTISSAGE PROFETIONNEL (CAP)',
            'Superviseur psycho-social' => 'Superviseur psycho-social',
            'GRH CAP Aprojed' => 'GRH CAP Aprojed',
            'Superviseur formateur CAP' => 'Superviseur formateur CAP',
            'Formateur log CAP' => 'Formateur log CAP',
            'ANTENNE APROJED' => 'ANTENNE APROJED',
            'Chef d’antenne BUVIRA' => 'Chef d’antenne BUVIRA',
            'Chef d’antenne MUGUNGA' => 'Chef d’antenne MUGUNGA',
            'Chef d’antenne KAYNA' => 'Chef d’antenne KAYNA',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Users', [
            'users' => User::query()
                ->when(request('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'profile_photo_path' => $user->profile_photo_path,
            ]),
            'roles' => $this->getRoleOptions(),
            'filters' => request()->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('UserCreate', [
            'roles' => $this->getRoleOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(array_keys($this->getRoleOptions()))],
            'telephone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $dataToCreate = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'address' => $request->address,
        ];

        if ($request->user()->role === 'admin' && $request->filled('role')) {
            $dataToCreate['role'] = $request->role;
        }

        User::create($dataToCreate);
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return redirect()->route('users.edit', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('UserEdit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'telephone' => $user->telephone,
                'address' => $user->address,
                'profile_photo_path' => $user->profile_photo_path,
            ],
            'roles' => $this->getRoleOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(array_keys($this->getRoleOptions()))],
            'telephone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $user->fill($request->except(['password', 'role']));

        if ($request->user()->role === 'admin' && $request->filled('role')) {
            $user->role = $request->role;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Prevent a user from deleting their own account
        if ($user->id === auth()->id()) {
            return redirect()->back()->withErrors(['error' => 'Vous ne pouvez pas supprimer votre propre compte.']);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
