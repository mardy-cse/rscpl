<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'business_hours' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'whatsapp_url' => 'nullable|url|max:255',
        ]);
        
        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }
        
        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
