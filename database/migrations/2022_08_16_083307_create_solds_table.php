<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedDecimal('base_price', 10, 2);
            $table->unsignedDecimal('total_price', 10, 2);
            $table->unsignedinteger('quantity_sold')->default(0);
            $table->foreign('product_category_id')->references('id')->on('productcategories');
            $table->string('sold_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solds');
    }
};
