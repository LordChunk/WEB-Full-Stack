<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'email' => 'admin@local',
          'role' => '2',
          'password' => Hash::make('admin@local'),
      ]);

        User::create([
            'email' => 'employee@local',
            'role' => '1',
            'password' => Hash::make('employee@local'),
        ]);
    }
}
