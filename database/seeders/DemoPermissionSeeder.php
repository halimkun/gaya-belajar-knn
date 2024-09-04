<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        foreach (['edit articles', 'delete articles', 'publish articles', 'unpublish articles'] as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }

        // Create roles and assign existing permissions
        $role = \Spatie\Permission\Models\Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');
        $role->givePermissionTo('delete articles');

        $role = \Spatie\Permission\Models\Role::create(['name' => 'editor']);
        $role->givePermissionTo('edit articles');
        $role->givePermissionTo('publish articles');
        $role->givePermissionTo('unpublish articles');

        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);

        // Create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example Writer',
            'email' => 'writer@mail.com',
        ]);
        $user->assignRole('writer');


        $user = \App\Models\User::factory()->create([
            'name' => 'Example Editor',
            'email' => 'editor@mail.com',
        ]);
        $user->assignRole('editor');
        
        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin',
            'email' => 'admin@mail.com',
        ]);
        $user->assignRole('admin');
    }
}
