<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeminiApiController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string'
        ]);

        $prompt = $request->input('prompt');
        $result = $this->recomend($prompt);
        
        return $result;
    }

    public function recomend(string $prompt)
    {
        if (env('GEMINI_API_KEY') === null) {
            throw new \Exception('GEMINI_API_KEY is not set in .env file');
        }

        $client = \Gemini::client(env('GEMINI_API_KEY'));
        
        $result = $client->geminiPro()->generateContent($prompt);
        return $result->text();
    }
}
