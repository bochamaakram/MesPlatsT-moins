<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Page;
use App\Support\Site\SiteCopy;
use App\Support\Site\SiteDefaults;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    /**
     * CMS slug → compiled SPA React Router path.
     * Only listed here when the two differ; all others fall through as identity.
     */
    private const SPA_PATHS = [
        'accueil' => '',
        'besoins' => 'vos-besoins',
    ];

    public function spa()
    {
        $html = file_get_contents(public_path('index.html'));

        // Fix html lang/dir for Arabic SEO & immediate RTL paint (before JS)
        $locale = request()->segment(1);
        if (! in_array($locale, ['fr', 'en', 'ar'], true)) {
            $locale = 'fr';
        }
        $dir = $locale === 'ar' ? 'rtl' : 'ltr';
        $html = preg_replace('/<html[^>]*>/i', '<html lang="'.$locale.'" dir="'.$dir.'">', $html, 1);

        $defaults = SiteDefaults::pages();
        $pages = Page::where('status', 'published')->get();

        $cmsContent = ['fr' => [], 'en' => [], 'ar' => []];

        $routeMap = ['fr' => [], 'en' => [], 'ar' => []];

        foreach ($pages as $page) {
            $slug = $page->slug;
            $spaPath = self::SPA_PATHS[$slug] ?? $slug;

            // Build route map for each language
            $slugs = $page->slugs ?? [];
            foreach (['fr', 'en', 'ar'] as $lang) {
                $translatedSlug = $slugs[$lang] ?? $slug;
                if (! empty($translatedSlug)) {
                    $routeMap[$lang]['/'.$translatedSlug] = '/'.$spaPath;
                }
            }

            if (! isset($defaults[$slug]['content'])) {
                continue;
            }

            $defaultContent = Arr::dot($defaults[$slug]['content']);
            $dbContentLocales = $page->content ?? [];

            foreach (['fr', 'en', 'ar'] as $lang) {
                $dbContent = Arr::dot($dbContentLocales[$lang] ?? []);

                foreach ($defaultContent as $key => $defaultString) {
                    if (is_string($defaultString) && ! empty(trim($defaultString))) {
                        if (isset($dbContent[$key]) && is_string($dbContent[$key]) && ! empty(trim($dbContent[$key]))) {
                            if ($defaultString !== $dbContent[$key]) {
                                $cmsContent[$lang][$defaultString] = $dbContent[$key];
                            }
                        }
                    }
                }
            }
        }

        // Merge the SPA copy translations last so the exact strings rendered by the
        // compiled bundle are always covered, even when they differ from SiteDefaults.
        foreach (['en', 'ar'] as $lang) {
            foreach (SiteCopy::forLanguage($lang) as $defaultString => $translation) {
                if (! empty(trim($defaultString)) && ! empty(trim($translation))) {
                    $cmsContent[$lang][$defaultString] = $translation;
                }
            }
        }

        $documents = Document::query()
            ->orderByDesc('created_at')
            ->get()
            ->map(fn (Document $document) => [
                'id' => $document->id,
                'title' => $document->title,
                'category' => $document->category,
                'description' => $document->description,
                'file_name' => $document->file_name,
                'size' => $document->file_size,
                'pdf_size' => $document->pdf_path ? (Storage::disk('public')->size($document->pdf_path) ?: null) : null,
                'mime_type' => $document->mime_type,
                'url' => $document->url,
                'pdf_url' => $document->pdf_url,
            ])
            ->values()
            ->all();

        $script = '<script>window.CMS_CONTENT = '.json_encode($cmsContent, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE).';'."\n".
                  'window.ROUTE_MAP = '.json_encode($routeMap, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE).';'."\n".
                  'window.CMS_DOCUMENTS = '.json_encode($documents, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE).';</script>';

        // Inject into <head>
        $html = str_replace('</head>', $script.'</head>', $html);

        return response($html)
            ->header('Content-Type', 'text/html; charset=UTF-8')
            ->header('Cache-Control', 'no-store');
    }
}
