<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menginisialisasi Faker untuk bahasa Indonesia
        $faker = Faker::create('id_ID');

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Membuat role admin dan siswa
        foreach (['admin', 'siswa'] as $role) {
            Role::create(['name' => $role]);
        }

        // Create the admin user and assign role 'admin'
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'), // Anda bisa mengganti dengan password yang diinginkan
        ]);
        $admin->assignRole('admin');

        // Create a demo siswa user using Faker
        $siswa = User::create([
            'name' => $faker->firstName . ' ' . $faker->lastName,
            'email' => 'siswa@mail.com',
            'password' => bcrypt('password'), // Anda bisa mengganti dengan password yang diinginkan
        ]);
        $siswa->assignRole('siswa');

        // Print seeding info to the console
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
