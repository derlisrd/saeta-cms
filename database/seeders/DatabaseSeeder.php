<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Administrador',
            'username'=>'admin',
            'email'=>'admin@saetacms.com',
            'type'=>0,
            'active'=>true,
            'password'=>Hash::make('admin123')
        ]);
        Category::create([
            'title'=>'Sin categoría',
            'slug'=>'sin-categoria'
        ]);
        // User::factory(10)->create();
    }
}
