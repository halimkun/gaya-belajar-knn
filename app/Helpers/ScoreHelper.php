<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class ScoreHelper
{
    /**
     * Calculate learning style score
     * 
     * @param Collection|array $data
     */
    public static function calculateLearningStyleScore(Collection $data)
    {
        // Inisialisasi array untuk menghitung gaya belajar
        $tempCountLearningStyle = [
            'visual' => 0,
            'auditori' => 0,
            'kinestetik' => 0,
        ];

        // Memastikan data adalah koleksi
        if (!($data instanceof Collection)) {
            $data = collect($data);
        }

        foreach ($data as $item) {
            // Mengecek apakah hubungan 'answer' ada
            $answers = $item->getRelation('answer');

            // Melanjutkan jika tidak ada jawaban
            if (!$answers) {
                continue;
            }

            // Memastikan ada gaya belajar yang terkait
            if ($answers->learningStyle) {
                $type = strtolower($answers->learningStyle->type);

                // Mengonversi tipe ke format yang sesuai
                switch ($type) {
                    case 'auditory':
                        $type = 'auditori';
                        break;
                    case 'kinesthetic':
                        $type = 'kinestetik'; // Perbaikan jika ingin konsisten dengan 'kinestetik'
                        break;
                    case 'visual':
                        $type = 'visual';
                        break;
                    default:
                        // Jika tipe tidak dikenal, bisa diabaikan atau dicatat
                        continue 2; // Melanjutkan ke iterasi berikutnya
                }

                // Menghitung jumlah untuk tipe gaya belajar
                if (array_key_exists($type, $tempCountLearningStyle)) {
                    $tempCountLearningStyle[$type] += 1;
                }
            }
        }

        return $tempCountLearningStyle;
    }
}
