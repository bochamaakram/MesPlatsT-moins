<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Support\Site\PageSchema;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageAdminController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::orderBy('id')->get();

        return Inertia::render('Admin/Pages/Index', [
            'pages' => $pages,
        ]);
    }

    public function edit(string $locale, Page $page)
    {
        $schemas = PageSchema::schemas();
        $schema = $schemas[$page->slug] ?? null;

        if (! $schema) {
            abort(404, 'Schéma de page introuvable.');
        }

        return Inertia::render('Admin/Pages/Edit', [
            'page' => $page,
            'schema' => $schema,
        ]);
    }

    public function update(Request $request, string $locale, Page $page)
    {
        $request->validate([
            'content' => 'array',
            'slugs' => 'array',
        ]);

        $page->update([
            'content' => $request->input('content', []),
            'slugs' => $request->input('slugs', []),
        ]);

        return redirect()->route('admin.pages.index', ['locale' => $locale])->with('success', 'Page mise à jour avec succès.');
    }
}
