<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningStylesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learningStyles = [
            ['type' => 'visual', 'description' => 'Visual learners learn best by seeing.'],
            ['type' => 'auditory', 'description' => 'Auditory learners learn best by hearing.'],
            ['type' => 'kinesthetic', 'description' => 'Kinesthetic learners learn best by doing.'],
        ];

        foreach ($learningStyles as $learningStyle) {
            \App\Models\LearningStyles::create($learningStyle);
        }
    }
}
