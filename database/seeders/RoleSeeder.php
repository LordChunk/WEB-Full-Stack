<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 1,
            'name' => 'admin',
            'permission_level' => 1,
        ]);

        Role::create([
            'id' => 2,
            'name' => 'serveerster',
            'permission_level' => 50,
        ]);

        Role::create([
            'id' => 3,
            'name' => 'kassamedewerker',
            'permission_level' => 50,
        ]);

    }
}
