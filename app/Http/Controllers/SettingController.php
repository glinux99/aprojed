<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        // On utilise firstOrCreate pour s'assurer qu'il y a toujours une ligne de paramètres.
        $partners = Partner::all();

        $settings = Setting::firstOrCreate([]);
        return Inertia::render('Settings', [
            'settings' => $settings,
            'partners'=>$partners
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'home_cover_photo' => 'nullable|image|max:2048', // 2MB Max
        ]);

        $settings = Setting::firstOrCreate([]);

        $settings->update($request->except('home_cover_photo'));

        if ($request->hasFile('home_cover_photo')) {
            if ($settings->home_cover_photo_path) {
                Storage::disk('public')->delete($settings->home_cover_photo_path);
            }
            $settings->home_cover_photo_path = $request->file('home_cover_photo')->store('settings_covers', 'public');
            $settings->save();
        }

        return Redirect::route('settings.index')->with('success', 'Paramètres mis à jour avec succès.');
    }
}
