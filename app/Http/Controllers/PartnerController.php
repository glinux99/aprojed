<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'logo' => 'required|image|max:2048',
        ]);

        $path = $request->file('logo')->store('partner_logos', 'public');

        Partner::create([
            'name' => $validated['name'],
            'url' => $validated['url'],
            'logo_path' => $path,
        ]);

        return Redirect::route('settings.index')->with('success', 'Partenaire ajouté avec succès.');
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        $partner->name = $validated['name'];
        $partner->url = $validated['url'];

        if ($request->hasFile('logo')) {
            if ($partner->logo_path) {
                Storage::disk('public')->delete($partner->logo_path);
            }
            $partner->logo_path = $request->file('logo')->store('partner_logos', 'public');
        }

        $partner->save();

        return Redirect::route('settings.index')->with('success', 'Partenaire mis à jour avec succès.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo_path) {
            Storage::disk('public')->delete($partner->logo_path);
        }
        $partner->delete();

        return Redirect::route('settings.index')->with('success', 'Partenaire supprimé avec succès.');
    }
}
