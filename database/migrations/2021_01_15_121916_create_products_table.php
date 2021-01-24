<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('title');
            $table->string('image');
            $table->integer('price');
            $table->timestamps();
        });

        DB::table('products')->insert(
            array(
                array(
                    'title' => 'Apple IPhone-XII',
                    'price' => '250',
                    'image' => 'product/12'
                ),
                array(
                    'title' => 'Apple IPhone-XI',
                    'price' => '150',
                    'image' => 'product/11'
                ),array(
                    'title' => 'Apple IPhone-X',
                    'price' => '100',
                    'image' => 'product/10'
                ),
            )
        );
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
