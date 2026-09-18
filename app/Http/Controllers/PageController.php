<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function sendContact(Request $request)
    {
        if (! $request->filled('subject') && ! $request->filled('message')) {
            $request->merge(['subject' => 'Newsletter — Inscription à la lettre d\'information']);
        }

        // Auto-fill missing fields for newsletter subscriptions
        if (str_contains($request->input('subject', ''), 'Newsletter') || str_contains($request->input('subject', ''), 'Lettre d\'information')) {
            if (! $request->filled('name')) {
                $request->merge(['name' => 'Abonné Newsletter']);
            }
            if (! $request->filled('company')) {
                $request->merge(['company' => '-']);
            }
            if (! $request->filled('phone')) {
                $request->merge(['phone' => '-']);
            }
            if (! $request->filled('message')) {
                $request->merge(['message' => 'Inscription newsletter depuis le site.']);
            }
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'city' => ['nullable', 'string', 'max:255'],
            'establishment_type' => ['nullable', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'consent' => ['required', 'accepted'],
        ]);

        if ($validator->fails()) {
            Log::error('Contact form validation failed', ['errors' => $validator->errors()->toArray(), 'data' => $request->all()]);
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            return back()->withErrors($validator->errors())->withInput();
        }

        ContactMessage::create($validator->validated());

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => __('messages.contact_sent'),
            ]);
        }

        return back()->with('success', __('messages.contact_sent'));
    }
}
