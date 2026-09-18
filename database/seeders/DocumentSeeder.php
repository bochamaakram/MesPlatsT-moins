<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Support\Documents\PdfGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $sourceDir = base_path('DOCUEMNTATIONS');

        if (! is_dir($sourceDir)) {
            $this->command?->warn('Le dossier DOCUEMNTATIONS est introuvable, documents ignorés.');

            return;
        }

        $mimeDetector = finfo_open(FILEINFO_MIME_TYPE);

        foreach ($this->documents() as $document) {
            $source = $sourceDir.'/'.$document['file'];

            if (! is_file($source)) {
                $this->command?->warn("Fichier source introuvable : {$document['file']}");

                continue;
            }

            $fileName = Str::slug(pathinfo($document['file'], PATHINFO_FILENAME)).'.'.mb_strtolower(pathinfo($document['file'], PATHINFO_EXTENSION));
            $path = 'documents/'.$fileName;

            Storage::disk('public')->put($path, file_get_contents($source));

            $size = Storage::disk('public')->size($path);
            $mimeType = finfo_file($mimeDetector, $source) ?: 'application/octet-stream';
            $pdfPath = app(PdfGenerator::class)->convert($path);

            Document::updateOrCreate(
                ['file_name' => $fileName],
                [
                    'title' => $document['title'],
                    'category' => $document['category'],
                    'description' => $document['description'] ?? null,
                    'file_path' => $path,
                    'pdf_path' => $pdfPath,
                    'file_size' => $size,
                    'mime_type' => $mimeType,
                ],
            );
        }

        finfo_close($mimeDetector);
    }

    /**
     * @return array<int, array{file: string, title: string, category: string, description?: string}>
     */
    private function documents(): array
    {
        return [
            [
                'file' => 'memo 01 lavage de smains/Memo_01_Lavage_des_mains_Modifiable.docx',
                'title' => 'Mémo 01 : Lavage des mains',
                'category' => 'Mémos',
                'description' => 'Les bonnes pratiques du lavage des mains avant toute manipulation des denrées alimentaires.',
            ],
            [
                'file' => 'memo 02 désinfection du matériel/MEMO 03 - Nettoyage et désinfection du matériel.docx',
                'title' => 'Mémo : Nettoyage et désinfection du matériel',
                'category' => 'Mémos',
                'description' => 'Protocole de nettoyage et de désinfection du matériel pour garantir l\'hygiène de la cuisine.',
            ],
            [
                'file' => 'memo 03 utilisation du thermomètre/Memo_02_Utilisation_du_thermometre_Modifiable.docx',
                'title' => 'Mémo : Utilisation du thermomètre',
                'category' => 'Mémos',
                'description' => 'Comment utiliser correctement un thermomètre pour contrôler les températures des aliments.',
            ],
            [
                'file' => 'memo 04 nettoyage du frigo/MEMO 04 - Nettoyage et désinfection des réfrigérateurs.docx',
                'title' => 'Mémo : Nettoyage et désinfection des réfrigérateurs',
                'category' => 'Mémos',
                'description' => 'Les étapes pour entretenir et désinfecter les réfrigérateurs en toute sécurité.',
            ],
            [
                'file' => 'memo 05 controle huile de friture/MEMO 05 - Contrôle des huiles de friture.docx',
                'title' => 'Mémo : Contrôle des huiles de friture',
                'category' => 'Mémos',
                'description' => 'Vérifier la qualité des huiles de friture et savoir quand les remplacer.',
            ],
            [
                'file' => 'memo 06  identification et traçabilité/MEMO 06 - Identification et traçabilité des produits.docx',
                'title' => 'Mémo 06 : Identification et traçabilité des produits',
                'category' => 'Mémos',
                'description' => 'Comment identifier et tracer les produits pour assurer leur traçabilité.',
            ],
            [
                'file' => 'Procedure_Prelèvement_Plats_Temoins_Modifiable.docx',
                'title' => 'Procédure de prélèvement des plats témoins',
                'category' => 'Procédures',
                'description' => 'Procédure de prélèvement, de conservation et de documentation des plats témoins.',
            ],
            [
                'file' => 'vos besoins guide _Choix_Thermometres_Alimentaires.docx',
                'title' => 'Guide : Choix des thermomètres alimentaires',
                'category' => 'Guides',
                'description' => 'Comment choisir le thermomètre alimentaire adapté à vos besoins.',
            ],
        ];
    }
}
