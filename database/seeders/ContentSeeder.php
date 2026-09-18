<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use App\Support\Site\SiteDefaults;
use App\Support\Site\Translations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mesplatstemoins.ma'],
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
        );

        User::updateOrCreate(
            ['email' => 'admin@mesplatstemolns.ma'],
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
        );

        foreach (SiteDefaults::pages() as $slug => $data) {
            $pageSlugs = Translations::slugs()[$slug] ?? ['fr' => $slug, 'en' => $slug, 'ar' => $slug];

            Page::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $data['title'],
                    'description' => $data['description'] ?? null,
                    'content' => [
                        'fr' => $data['content'],
                        'en' => Translations::en()[$slug]['content'] ?? $data['content'],
                        'ar' => Translations::ar()[$slug]['content'] ?? $data['content'],
                    ],
                    'slugs' => $pageSlugs,
                    'status' => 'published',
                ],
            );
        }

        Setting::setValue('site', SiteDefaults::settings());
    }
}
