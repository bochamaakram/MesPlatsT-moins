<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Guides', 'Réglementation', 'Fiches pratiques', 'Affiches'];

        return [
            'title' => $this->faker->words(3, true),
            'category' => $this->faker->randomElement($categories),
            'description' => $this->faker->paragraph(),
            'file_path' => 'documents/'.Str::uuid().'.pdf',
            'pdf_path' => 'documents/'.Str::uuid().'.pdf',
            'file_name' => Str::slug($this->faker->words(3, true)).'.pdf',
            'file_size' => $this->faker->numberBetween(5000, 2000000),
            'mime_type' => 'application/pdf',
        ];
    }
}
