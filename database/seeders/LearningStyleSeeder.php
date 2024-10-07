<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learningStyles = [
            ['type' => 'visual', 'description' => 'Pembelajar visual belajar paling baik dengan melihat.'],
            ['type' => 'auditory', 'description' => 'Pembelajar auditori belajar paling baik dengan mendengar.'],
            ['type' => 'kinesthetic', 'description' => 'Pembelajar kinestetik belajar paling baik dengan melakukan atau bergerak.'],
        ];

        foreach ($learningStyles as $learningStyle) {
            \App\Models\LearningStyle::create($learningStyle);
        }
    }
}
