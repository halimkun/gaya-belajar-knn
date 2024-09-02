<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // print on console
        $this->command->info('SEEDING DATABASE');
        $this->command->info('=================');
        
        $this->command->info('Seeding learning styles...');
        $this->call(LearningStylesSeeder::class);

        $this->command->info('Seeding questions...');
        $this->call(QuestionsSeeder::class);
    }
}
