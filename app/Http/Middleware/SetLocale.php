<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    protected array $supportedLocales = ['fr', 'en', 'ar'];

    protected string $defaultLocale = 'fr';

    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if ($locale && in_array($locale, $this->supportedLocales, true)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            $locale = Session::get('locale', $this->defaultLocale);
            App::setLocale($locale);
        }

        URL::defaults(['locale' => $locale]);

        return $next($request);
    }
}
