<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'unreadMessages' => ContactMessage::query()->unread()->count(),
                'messages' => ContactMessage::count(),
            ],
        ]);
    }
}
