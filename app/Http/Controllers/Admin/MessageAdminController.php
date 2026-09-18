<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessageAdminController extends Controller
{
    public function index(Request $request)
    {
        $messages = ContactMessage::query()
            ->orderByDesc('created_at')
            ->paginate(20);

        return Inertia::render('Admin/Messages/Index', [
            'messages' => $messages,
        ]);
    }

    public function toggleRead(string $locale, ContactMessage $message)
    {
        if ($message->isRead()) {
            $message->update(['read_at' => null]);
        } else {
            $message->markAsRead();
        }

        return back();
    }

    public function destroy(string $locale, ContactMessage $message)
    {
        $message->delete();

        return back()->with('success', __('messages.message_deleted'));
    }
}
