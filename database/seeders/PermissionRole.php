<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Str;

class PermissionRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Effacer toutes les roles et les permissions qui esont en caches
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // creation des permissions
        Permission::create(['name' => 'crud produit']);
        Permission::create(['name' => 'crud vendeur']);
        Permission::create(['name' => 'config']);
        Permission::create(['name' => 'voir site']);
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo(['crud produit', 'crud vendeur', 'config']);

        $role2 = Role::create(['name' => 'client']);
        $role3 = Role::create(['name' => 'partenaire']);
        $role4 = Role::create(['name' => 'fournisseur']);
        $role4 = Role::create(['name' => 'staff']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => "Daniel Kikimba",
            'email' => 'genesiskikimba@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole($role1);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Admin User',
        //     'email' => 'admin@example.com',
        // ]);
        // $user->assignRole($role2);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Super-Admin User',
        //     'email' => 'superadmin@example.com',
        // ]);
        // $user->assignRole($role3);

    }
}
