<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create role guru and admin
        foreach (['guru', 'siswa'] as $key => $value) {
            \Spatie\Permission\Models\Role::create(['name' => $value]);
        }

        // Create demo users
        User::factory()->create([
            'name'  => 'Guru',
            'email' => 'guru@mail.com',
        ])->assignRole('guru');

        User::factory()->create([
            'name'  => 'Siswa',
            'email' => 'siswa@mail.com',
        ])->assignRole('siswa');

        // print on console
        $this->command->info('SEEDING DATABASE');
        $this->command->info('=================');

        $this->command->info('Seeding learning styles...');
        $this->call(LearningStyleSeeder::class);

        $this->command->info('Seeding Educational Content...');
        $this->call(EducationalContentSeeder::class);

        $this->command->info('Seeding questions...');
        $this->call(QuestionSeeder::class);

        $this->command->info('Seeding datasets...');
        $this->call(DatasetSeeder::class);
    }
}
