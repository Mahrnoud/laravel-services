<?php
declare(strict_types=1);

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {

	public function run()
	{
		// T-shirt
		Product::create([

            'product' => "T-shirt",
            'description' => "Cotton t-shirt summer new collection"
        ]);
	}
}
