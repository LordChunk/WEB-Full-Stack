<?php

namespace Database\Seeders;

use App\Models\NavigationItem;
use Illuminate\Database\Seeder;

class NavigationItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NavigationItem::create([
            'name'=>'Home',
            'url'=>'/',
        ]);
        NavigationItem::create([
            'name'=>'Menu',
            'url'=>'/menu',
        ]);
        // NavigationItem::create([
        //     'name'=>'Login',
        //     'url'=>'/login',
        // ]);

        // NavigationItem::create([
        //   'name'=>'Employee Menu',
        //   'url'=>'/employee/menu',
        // ]);

        NavigationItem::create([
            'name'=>'Nieuws',
            'url'=>'/news',
        ]);

        NavigationItem::create([
            'name'=>'Over ons',
            'url'=>'/about',
        ]);
    }
}
