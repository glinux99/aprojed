<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SettingController extends Controller
{
    /**
     * Affiche la page des paramètres avec toutes les valeurs actuelles.
     */
    public function index()
    {
        $settings = \App\Models\Setting::all()->pluck('value', 'key')->toArray();

        // Convertir les chemins relatifs des fichiers en URLs publiques
        $fileKeys = ['logo_url', 'favicon_url'];
        foreach ($fileKeys as $key) {
            if (!empty($settings[$key])) {
                $settings[$key] = Storage::disk('media_public')->url($settings[$key]);
            }
        }

        return Inertia::render('Admin/Settings', [
            'settings' => $settings,
        ]);
    }

    /**
     * Enregistre les paramètres (texte + fichiers logo/favicon).
     */
    public function update(Request $request)
    {

        // Liste des champs texte autorisés
        $textFields = [
            'site_name', 'tagline', 'description',
            'email', 'secondary_email', 'phone', 'secondary_phone',
            'address', 'city', 'postal_code', 'country',
            'facebook', 'twitter', 'instagram', 'linkedin', 'youtube',
            'bank_name', 'bank_iban', 'bank_bic', 'bank_account',
            'rccm', 'tax_id', 'capital',
            'copyright_text', 'privacy_policy_url', 'terms_url',
            // Hero Campaign Fields
            'hero_campaign_active', 'hero_campaign_badge',
            'hero_campaign_title', 'hero_campaign_description',
            'hero_campaign_current', 'hero_campaign_target',
            'hero_campaign_btn_text', 'additional_offices', 'additional_banks',
        ];

        // Validation de base
        $request->validate([
            'logo_light' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'logo_dark' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:1024',
            'delete_logo_light' => 'boolean',
            'delete_logo_dark' => 'boolean',
            'delete_favicon' => 'boolean',
            'hero_campaign_active' => 'boolean',
            'hero_campaign_current' => 'nullable|numeric|min:0',
            'hero_campaign_target' => 'nullable|numeric|min:0',
            'additional_offices'=> 'nullable',
            'additional_banks'=> 'nullable',
        ]);

        // Mise à jour des champs texte
        foreach ($textFields as $field) {
            if ($request->has($field)) {
                $value = $request->input($field);
                // Convertir explicitement le booléen pour la base de données si nécessaire
                if ($field === 'hero_campaign_active') $value = $request->boolean($field) ? '1' : '0';
                $this->setSetting($field, $value ?? '');
            }
        }

        // Gestion du logo Light
        if ($request->boolean('delete_logo_light')) {
            $this->deleteFileSetting('logo_light_url');
            $this->setSetting('logo_light_url', '');
        }
        if ($request->hasFile('logo_light')) {
            $this->deleteFileSetting('logo_light_url');
            $path = $request->file('logo_light')->store('settings', 'media_public');
            $this->setSetting('logo_light_url', $path);
        }

        // Gestion du logo Dark
        if ($request->boolean('delete_logo_dark')) {
            $this->deleteFileSetting('logo_dark_url');
            $this->setSetting('logo_dark_url', '');
        }
        if ($request->hasFile('logo_dark')) {
            $this->deleteFileSetting('logo_dark_url');
            $path = $request->file('logo_dark')->store('settings', 'media_public');
            $this->setSetting('logo_dark_url', $path);
        }

        // Gestion du favicon
        if ($request->boolean('delete_favicon')) {
            $this->deleteFileSetting('favicon_url');
            $this->setSetting('favicon_url', '');
        }
        if ($request->hasFile('favicon')) {
            $this->deleteFileSetting('favicon_url');
            $path = $request->file('favicon')->store('settings', 'media_public');
            $this->setSetting('favicon_url', $path);
        }

        return redirect()->route('settings.index')
            ->with('success', 'Paramètres enregistrés avec succès.');
    }

    /**
     * Enregistre une valeur pour une clé donnée.
     */
    private function setSetting(string $key, $value)
    {
        \App\Models\Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /**
     * Supprime le fichier stocké pour une clé donnée (logo_url, favicon_url).
     */
    private function deleteFileSetting(string $key)
    {
        $setting = \App\Models\Setting::where('key', $key)->first();
        if ($setting && !empty($setting->value)) {
            // La valeur est le chemin relatif (ex: settings/logo.jpg)
            Storage::disk('media_public')->delete($setting->value);
        }
    }
}
