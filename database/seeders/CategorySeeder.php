<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'Novel'
            ],
            [
                'name' => 'Komik'
            ],
            [
                'name' => 'Antologi'
            ],
            [
                'name' => 'Biografi'
            ],
            [
                'name' => 'Buku Ilmiah'
            ],
            [
                'name' => 'Panduan'
            ],
        ]);
    }
}
