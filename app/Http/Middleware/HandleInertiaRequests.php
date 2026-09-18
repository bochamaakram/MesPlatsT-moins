<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use App\Support\Site\SiteDefaults;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $locale = app()->getLocale();

        return [
            ...parent::share($request),
            'locale' => $locale,
            'dir' => $locale === 'ar' ? 'rtl' : 'ltr',
            'auth' => [
                'user' => $request->user(),
            ],
            'settings' => array_replace_recursive(SiteDefaults::settings(), Setting::site()),
            'flash' => [
                'success' => $request->session()->get('success'),
                'error' => $request->session()->get('error'),
                'download' => $request->session()->get('download'),
            ],
        ];
    }
}
