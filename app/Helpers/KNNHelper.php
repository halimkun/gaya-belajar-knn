<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class KNNHelper
{
    public static function predict(array $data)
    {
        try {
            // Mengirim permintaan POST ke endpoint : https://knn-model.7p43.my.id/predict
            $response = Http::post(env("MODEL_REST_URL", null), $data);

            // Memeriksa apakah respons berhasil
            if ($response->successful()) {
                // Mengembalikan prediksi dari respons JSON
                return $response->json()['prediction'] ?? null; // Mengembalikan null jika 'prediction' tidak ada
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
}
