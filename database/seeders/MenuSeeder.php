<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan telur, ayam, dan sayuran',
                'price' => 25000,
                'category' => 'makanan',
            ],
            [
                'name' => 'Mie Goreng',
                'description' => 'Mie goreng dengan sayuran dan bakso',
                'price' => 20000,
                'category' => 'makanan',
            ],
            [
                'name' => 'Ayam Bakar',
                'description' => 'Ayam bakar dengan sambal dan lalapan',
                'price' => 30000,
                'category' => 'makanan',
            ],
            [
                'name' => 'Es Teh Manis',
                'description' => 'Teh manis dingin',
                'price' => 5000,
                'category' => 'minuman',
            ],
            [
                'name' => 'Es Jeruk',
                'description' => 'Jeruk peras segar',
                'price' => 8000,
                'category' => 'minuman',
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}