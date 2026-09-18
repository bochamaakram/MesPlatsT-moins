<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Support\Documents\PdfGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class DocumentAdminController extends Controller
{
    public function index(): Response
    {
        $documents = Document::query()
            ->orderByDesc('created_at')
            ->get();

        return Inertia::render('Admin/Documents/Index', [
            'documents' => $documents,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Documents/Edit');
    }

    public function store(Request $request, string $locale): RedirectResponse
    {
        $data = $request->validate($this->rules());

        $path = $request->file('file')->store('documents', 'public');

        $pdfPath = app(PdfGenerator::class)->convert($path);

        Document::create([
            'title' => $data['title'],
            'category' => $data['category'] ?? null,
            'description' => $data['description'] ?? null,
            'file_path' => $path,
            'pdf_path' => $pdfPath,
            'file_name' => $request->file('file')->getClientOriginalName(),
            'file_size' => $request->file('file')->getSize(),
            'mime_type' => $request->file('file')->getMimeType(),
        ]);

        return redirect()
            ->route('admin.documents.index', ['locale' => $locale])
            ->with('success', __('messages.document_created'));
    }

    public function edit(string $locale, Document $document): Response
    {
        return Inertia::render('Admin/Documents/Edit', [
            'document' => $document,
        ]);
    }

    public function update(Request $request, string $locale, Document $document): RedirectResponse
    {
        $data = $request->validate($this->rules(true));

        $attributes = [
            'title' => $data['title'],
            'category' => $data['category'] ?? null,
            'description' => $data['description'] ?? null,
        ];

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);

            if ($document->pdf_path && $document->pdf_path !== $document->file_path) {
                Storage::disk('public')->delete($document->pdf_path);
            }

            $attributes['file_path'] = $request->file('file')->store('documents', 'public');
            $attributes['pdf_path'] = app(PdfGenerator::class)->convert($attributes['file_path']);
            $attributes['file_name'] = $request->file('file')->getClientOriginalName();
            $attributes['file_size'] = $request->file('file')->getSize();
            $attributes['mime_type'] = $request->file('file')->getMimeType();
        }

        $document->update($attributes);

        return redirect()
            ->route('admin.documents.index', ['locale' => $locale])
            ->with('success', __('messages.document_updated'));
    }

    public function destroy(string $locale, Document $document): RedirectResponse
    {
        Storage::disk('public')->delete($document->file_path);

        if ($document->pdf_path && $document->pdf_path !== $document->file_path) {
            Storage::disk('public')->delete($document->pdf_path);
        }

        $document->delete();

        return redirect()
            ->route('admin.documents.index', ['locale' => $locale])
            ->with('success', __('messages.document_deleted'));
    }

    /**
     * @return array<string, string>
     */
    private function rules(bool $withFile = false): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => ['required', 'file', 'mimes:pdf,doc,docx,odt,rtf,xls,xlsx,ppt,pptx,txt', 'max:20480'],
        ];

        if ($withFile) {
            $rules['file'] = ['nullable', 'file', 'mimes:pdf,doc,docx,odt,rtf,xls,xlsx,ppt,pptx,txt', 'max:20480'];
        }

        return $rules;
    }
}
