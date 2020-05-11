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
            $table->id();
            $table->foreignId('vendor_id');
            $table->integer('sku');
            $table->string('product', 500);
            $table->string('material', 500);
            $table->text('description');
            $table->text('productImage');
            $table->string('price', 200);
            $table->string('discount', 200);
            $table->enum('status', ['Approved', 'Pending', 'Declined']);
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();

        });
        \DB::unprepared("ALTER TABLE  `products` CHANGE  `sku`  `sku` INT( 3 ) UNSIGNED ZEROFILL NOT NULL DEFAULT '1';");
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
