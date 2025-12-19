<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        // 1. Input Validation
        $request->validate([
            'message' => 'required|string',
        ]);

        $apiKey = env('GEMINI_API_KEY');
        $message = $request->input('message');

        // 2. Request to Google Gemini API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $message]
                    ]
                ]
            ]
        ]);

        // 3. Success Check
        if ($response->successful()) {
            $data = $response->json();

            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak mengerti.';
            
            return response()->json([
                'success' => true,
                'message' => $reply
            ]);
        } else {
            Log::error('Gemini API Error: ' . $response->body());
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghubungi AI'
            ], 500);
        }
    }
}