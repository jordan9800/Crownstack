<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', $precision = 5, $scale = 2);
            $table->integer('category_id')->unsigned();
            $table->integer('make')->unsigned();
            $table->string('image');
            $table->json('extra_images')->nullable();
            $table->tinyInteger('quantity')->unsigned();
            $table->boolean('featured')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')
            ->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
