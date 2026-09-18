<?php

namespace App\Support\Site;

class SiteCopy
{
    private static ?array $cache = null;

    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        self::$cache = [
            'fr' => [],
            'en' => self::load('en.json'),
            'ar' => self::load('ar.json'),
        ];

        return self::$cache;
    }

    public static function forLanguage(string $lang): array
    {
        return self::all()[$lang] ?? [];
    }

    private static function load(string $file): array
    {
        $path = resource_path('site-copy/'.$file);

        if (! is_file($path)) {
            return [];
        }

        $json = json_decode((string) file_get_contents($path), true);

        return is_array($json) ? $json : [];
    }
}
