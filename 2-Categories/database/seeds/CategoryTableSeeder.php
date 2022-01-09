<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        // Women
        Category::create([

            'category' => "Women",
            'description' => "Women category description"
        ]);
    }
}
