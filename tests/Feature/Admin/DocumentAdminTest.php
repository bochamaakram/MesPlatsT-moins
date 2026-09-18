<?php

namespace Tests\Feature\Admin;

use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class DocumentAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login_when_accessing_documents(): void
    {
        $this->get('/fr/admin/documents')
            ->assertRedirect('/fr/login');
    }

    public function test_admin_can_view_documents_listing(): void
    {
        $user = User::factory()->create();
        $document = Document::factory()->create([
            'title' => 'Guide hygiène alimentaire',
            'file_path' => 'documents/guide.pdf',
            'pdf_path' => 'documents/guide.pdf',
            'file_name' => 'guide.pdf',
            'file_size' => 2048,
            'mime_type' => 'application/pdf',
        ]);

        $this->actingAs($user)
            ->get('/fr/admin/documents')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Admin/Documents/Index')
                ->has('documents', 1)
                ->where('documents.0.title', 'Guide hygiène alimentaire')
                ->where('documents.0.url', url('/storage/documents/guide.pdf'))
                ->where('documents.0.pdf_url', url('/storage/documents/guide.pdf'))
                ->where('documents.0.size_for_humans', '2 Ko'));
    }

    public function test_admin_can_upload_a_document(): void
    {
        Storage::fake('public');

        $this->actingAs(User::factory()->create())
            ->post('/fr/admin/documents', [
                'title' => 'Checklist hygiène',
                'category' => 'Fiches pratiques',
                'description' => 'Checklist prête à imprimer.',
                'file' => UploadedFile::fake()->create('checklist-hygiene.pdf', 1024, 'application/pdf'),
            ])
            ->assertRedirect('/fr/admin/documents');

        $this->assertDatabaseHas('documents', [
            'title' => 'Checklist hygiène',
            'category' => 'Fiches pratiques',
            'description' => 'Checklist prête à imprimer.',
            'file_name' => 'checklist-hygiene.pdf',
            'mime_type' => 'application/pdf',
        ]);

        $document = Document::where('title', 'Checklist hygiène')->firstOrFail();

        Storage::disk('public')->assertExists($document->file_path);
        $this->assertStringStartsWith('documents/', $document->file_path);
    }

    public function test_upload_requires_a_title_and_a_file(): void
    {
        $this->actingAs(User::factory()->create())
            ->from('/fr/admin/documents/create')
            ->post('/fr/admin/documents', [])
            ->assertSessionHasErrors(['title', 'file']);
    }

    public function test_upload_rejects_a_disallowed_file_type(): void
    {
        $this->actingAs(User::factory()->create())
            ->from('/fr/admin/documents/create')
            ->post('/fr/admin/documents', [
                'title' => 'Malicious file',
                'file' => UploadedFile::fake()->create('malware.exe', 100),
            ])
            ->assertSessionHasErrors('file');
    }

    public function test_admin_can_update_metadata_and_replace_the_file(): void
    {
        Storage::fake('public');

        $oldPath = 'documents/old-guide.pdf';
        $oldPdfPath = 'documents/old-guide-extra.pdf';
        Storage::disk('public')->put($oldPath, 'old content');
        Storage::disk('public')->put($oldPdfPath, 'old pdf');
        $document = Document::factory()->create([
            'title' => 'Ancien guide',
            'file_path' => $oldPath,
            'pdf_path' => $oldPdfPath,
            'file_name' => 'old-guide.pdf',
        ]);

        $this->actingAs(User::factory()->create())
            ->put('/fr/admin/documents/'.$document->id, [
                'title' => 'Nouveau guide',
                'category' => 'Guides',
                'description' => 'Version actualisée.',
                'file' => UploadedFile::fake()->create('new-guide.pdf', 2048, 'application/pdf'),
            ])
            ->assertRedirect('/fr/admin/documents');

        $this->assertDatabaseHas('documents', [
            'id' => $document->id,
            'title' => 'Nouveau guide',
            'category' => 'Guides',
            'file_name' => 'new-guide.pdf',
        ]);

        $document->refresh();
        Storage::disk('public')->assertMissing($oldPath);
        Storage::disk('public')->assertMissing($oldPdfPath);
        Storage::disk('public')->assertExists($document->file_path);
        $this->assertNotSame($oldPath, $document->file_path);
    }

    public function test_admin_can_update_metadata_without_replacing_the_file(): void
    {
        Storage::fake('public');

        $path = 'documents/guide.pdf';
        Storage::disk('public')->put($path, 'content');
        $document = Document::factory()->create([
            'title' => 'Guide initial',
            'file_path' => $path,
        ]);

        $this->actingAs(User::factory()->create())
            ->put('/fr/admin/documents/'.$document->id, [
                'title' => 'Guide renommé',
            ])
            ->assertRedirect('/fr/admin/documents');

        $this->assertDatabaseHas('documents', [
            'id' => $document->id,
            'title' => 'Guide renommé',
        ]);

        $this->assertSame($path, $document->refresh()->file_path);
        Storage::disk('public')->assertExists($path);
    }

    public function test_admin_can_delete_a_document_and_its_file(): void
    {
        Storage::fake('public');

        $path = 'documents/a-supprimer.pdf';
        $pdfPath = 'documents/a-supprimer-extra.pdf';
        Storage::disk('public')->put($path, 'content');
        Storage::disk('public')->put($pdfPath, 'pdf content');
        $document = Document::factory()->create([
            'title' => 'Document à supprimer',
            'file_path' => $path,
            'pdf_path' => $pdfPath,
        ]);

        $this->actingAs(User::factory()->create())
            ->delete('/fr/admin/documents/'.$document->id)
            ->assertRedirect('/fr/admin/documents');

        $this->assertDatabaseMissing('documents', ['id' => $document->id]);
        Storage::disk('public')->assertMissing($path);
        Storage::disk('public')->assertMissing($pdfPath);
    }
}
