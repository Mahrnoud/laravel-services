<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('product');
			$table->text('description');
			$table->string('image', 64)->nullable();
			$table->string('image_thumbnail', 64)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
