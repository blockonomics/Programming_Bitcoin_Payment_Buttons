<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('address')->primary();
            $table->string('product_name');
            $table->float('offered_price');
            $table->string('color');
            $table->bigInteger('user_id')->unsigned();
            $table->set('status',[-2,-1,0,1,2])->default('0');
            $table->timestampTz('created_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function(Blueprint $table){
            $table->dropForeign('transaction_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('transaction');
    }
}
