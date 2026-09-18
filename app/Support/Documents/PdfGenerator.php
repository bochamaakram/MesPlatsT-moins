<?php

namespace App\Support\Documents;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class PdfGenerator
{
    private const OFFICE_MIMES = [
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/vnd.oasis.opendocument.text',
        'application/msword',
    ];

    /**
     * Produce a PDF version of a stored document on the public disk.
     */
    public function convert(string $path): ?string
    {
        if (app()->environment('testing')) {
            return null;
        }

        if (pathinfo($path, PATHINFO_EXTENSION) === 'pdf') {
            return $path;
        }

        $disk = Storage::disk('public');

        if (! $disk->exists($path)) {
            return null;
        }

        if (! in_array($disk->mimeType($path), self::OFFICE_MIMES, true)) {
            return null;
        }

        $tempDir = storage_path('app/cache/docs-pdf-'.uniqid());
        $profileDir = $tempDir.'/lo-profile';

        try {
            File::makeDirectory($profileDir, 0755, true);

            $process = new Process([
                'soffice',
                '-env:UserInstallation=file://'.$profileDir,
                '--headless',
                '--norestore',
                '--convert-to',
                'pdf',
                '--outdir',
                $tempDir,
                $disk->path($path),
            ]);
            $process->setTimeout(120);
            $process->run();

            if (! $process->isSuccessful()) {
                return null;
            }

            $pdfName = pathinfo($path, PATHINFO_FILENAME).'.pdf';
            $converted = $tempDir.'/'.$pdfName;

            if (! is_file($converted)) {
                return null;
            }

            $target = dirname($path).'/'.$pdfName;
            $disk->put($target, file_get_contents($converted));

            return $target;
        } catch (\Throwable $e) {
            Log::warning("Échec de la conversion PDF de [{$path}] : {$e->getMessage()}");

            return null;
        } finally {
            File::deleteDirectory($tempDir);
        }
    }
}
