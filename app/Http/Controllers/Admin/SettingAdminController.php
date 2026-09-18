<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\Site\SiteDefaults;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingAdminController extends Controller
{
    public function edit()
    {
        $settings = Setting::site();

        return Inertia::render('Admin/Settings/Edit', [
            'settings' => array_merge(SiteDefaults::settings(), $settings),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'contact.entity' => ['required', 'string', 'max:255'],
            'contact.email' => ['required', 'email', 'max:255'],
            'contact.phoneDisplay' => ['required', 'string', 'max:255'],
            'contact.phoneRaw' => ['required', 'string', 'max:50'],
            'contact.whatsapp' => ['required', 'string', 'max:50'],
            'contact.address' => ['required', 'string', 'max:255'],
            'contact.services' => ['nullable', 'string', 'max:255'],
            'contact.hours' => ['nullable', 'string', 'max:255'],
            'footer.mission' => ['nullable', 'string'],
            'footer.newsletterTitle' => ['nullable', 'string', 'max:255'],
            'footer.copyright' => ['nullable', 'string', 'max:255'],
            'banner.title' => ['nullable', 'string', 'max:255'],
            'banner.text' => ['nullable', 'string', 'max:255'],
            'banner.cta' => ['nullable', 'string', 'max:255'],
            'banner.href' => ['nullable', 'string', 'max:255'],
        ]);

        Setting::setValue('site', array_replace_recursive(SiteDefaults::settings(), $data));

        return back()->with('success', __('messages.settings_updated'));
    }

    public function reset(Request $request)
    {
        Setting::setValue('site', SiteDefaults::settings());

        return back()->with('success', __('messages.settings_reset'));
    }
}
