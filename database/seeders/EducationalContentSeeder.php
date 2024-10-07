<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationalContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $learningStyles = \App\Models\LearningStyle::all();
        
        $educationalEmoji = [
            '📚', '📖', '📕', '📗', '📘', '📙', '📓', '📔', '📒', '📚', '📖', '📕', '📗', '📘', '📙', '📓', '📔', '📒', '🎓', '👨🏻‍🎓', '👩🏻‍🎓', '📚', '👨‍🎓', '🙋🏻‍♂️', '👩‍🎓', '🙋🏻‍♀️'
        ];

        foreach ($learningStyles as $learningStyle) {
            for ($i = 1; $i <= rand(3, 5); $i++) {
            $emoji = $educationalEmoji[array_rand($educationalEmoji)];
            \App\Models\EducationalContent::create([
                "title" => $emoji . " Materi Pembelajaran " . $learningStyle->type . " " . $i,
                "content" => $faker->realTextBetween(400, 800),
                "learning_style_id" => $learningStyle->id,
            ]);
            }
        }
    }
}
