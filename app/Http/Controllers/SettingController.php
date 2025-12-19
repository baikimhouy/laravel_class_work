<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display and edit the settings (single record)
     */
    public function index()
    {
        $settings = $this->getOrCreateSettings();
        
        return view('settings.index', compact('settings'));
    }

    /**
     * Update the settings
     */
    public function update(Request $request)
    {
        $settings = Settings::firstOrFail();
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'facebook' => 'nullable|max:255',
            'telegram' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'youtube' => 'nullable|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'remove_logo' => 'nullable|boolean'
        ]);

        $this->handleLogo($request, $settings, $validated);

        $settings->update($validated);
        
        return redirect()->route('settings.index')
            ->with('success', 'Settings updated successfully.'); 
    }

    /**
     * Get or create the settings record
     */
    private function getOrCreateSettings(): Settings
    {
        return Settings::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Site Title',
                'email' => 'info@example.com',
                'phone' => '',
                'facebook' => '',
                'telegram' => '',
                'instagram' => '',
                'youtube' => '',
                'description' => '',
                'logo' => null,
            ]
        );
    }

    /**
     * Handle logo upload, removal, or retention
     */
    private function handleLogo(Request $request, Settings $settings, array &$validated): void
    {
        // Handle logo removal
        if ($request->input('remove_logo') == '1') {
            $this->deleteLogo($settings->logo);
            $validated['logo'] = null;
            return;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $this->deleteLogo($settings->logo);
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
            return;
        }

        // Keep existing logo
        $validated['logo'] = $settings->logo;
    }

    /**
     * Delete logo file if it exists
     */
    private function deleteLogo(?string $logoPath): void
    {
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            Storage::disk('public')->delete($logoPath);
        }
    }
}