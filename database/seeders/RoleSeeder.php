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
            'role' => 'employee',
            'permission_level' => 50,
        ]);

        Role::create([
            'id' => 2,
            'role' => 'superUser',
            'permission_level' => 100,
        ]);
    }
}
