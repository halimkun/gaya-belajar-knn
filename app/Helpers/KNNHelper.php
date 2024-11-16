<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class KNNHelper
{
    public static function predict(array $data)
    {
        try {
            $baseUrl = rtrim(env("KNN_MODEL_BASE_URL", null), '/');
            $response = Http::post($baseUrl . '/predict', $data);

            // Memeriksa apakah respons berhasil
            if ($response->successful()) {
                // Mengembalikan prediksi dari respons JSON
                return $response->json(); // Mengembalikan null jika 'prediction' tidak ada
            } else {
                // Menangani respons yang tidak berhasil
                \Log::error('Prediction API error: ' . $response->body());
                return null; // Mengembalikan null atau nilai default jika permintaan tidak berhasil
            }
        } catch (\Throwable $th) {
            // Menangkap kesalahan dan mencatatnya
            \Log::error('Error in predict function: ' . $th->getMessage());
            return null; // Mengembalikan null atau nilai default saat terjadi kesalahan
        }
    }

    public static function importance()
    {
        try {
            $baseUrl = rtrim(env("KNN_MODEL_BASE_URL", null), '/');
            $response = Http::get($baseUrl . '/importance');

            if ($response->successful()) {
                \Log::info('GET IMPORTANCE SUCCESS : '. $response->body());
                return $response->json();
            } else {
                \Log::error('GET IMPORTANCE ERROR : '. $response->body());
                return null;
            }
        } catch (\Throwable $th) {
            \Log::error('GET IMPORTANCE ERROR : '. $th->getMessage());
            return null;
        }
    }
}
