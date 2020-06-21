<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->string('size');
            $table->integer('quantity');
            $table->tinyInteger('customized')->default('0');
            $table->string('memo')->nullable();
            $table->string('session_token');
            $table->string('session_id')->references('id')->on('sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
