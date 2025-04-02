<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $categories = [
        'Elettronica',
        'Abbigliamento',
        'Salute e bellezza',
        'Casa e giardinaggio',
        'Giocattoli',
        'Sport',
        'Animali domestici',
        'Libri e riviste',
        'Accessori',
        'Motori'
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => __($category)
            ]);
        }
    }
}
