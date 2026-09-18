<?php

namespace App\Models;

use Database\Factories\DocumentFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    /** @use HasFactory<DocumentFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['url', 'pdf_url', 'size_for_humans'];

    protected function casts(): array
    {
        return [
            'file_size' => 'integer',
        ];
    }

    protected function url(): Attribute
    {
        return Attribute::get(fn (): string => Storage::disk('public')->url($this->file_path));
    }

    protected function pdfUrl(): Attribute
    {
        return Attribute::get(fn (): ?string => $this->pdf_path ? Storage::disk('public')->url($this->pdf_path) : null);
    }

    protected function sizeForHumans(): Attribute
    {
        return Attribute::get(function (): string {
            $bytes = (int) $this->file_size;
            $units = ['o', 'Ko', 'Mo', 'Go'];

            if ($bytes === 0) {
                return '0 o';
            }

            $power = (int) floor(log($bytes, 1024));
            $value = $bytes / (1024 ** min($power, count($units) - 1));

            return round($value, 1).' '.$units[min($power, count($units) - 1)];
        });
    }
}
