<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Config;
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
        Config::create([
            'option'=>'site_name',
            'value'=>'Sitio increible'
        ]);
        Config::create([
            'option'=>'site_description',
            'value'=>'Un sitio creado con php'
        ]);
        Config::create([
            'option'=>'site_copyright',
            'value'=>'Copyright'
        ]);
        Config::create([
            'option'=>'site_template',
            'value'=>'initial'
        ]);
        // User::factory(10)->create();
    }
}
