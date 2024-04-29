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
        Schema::create('deal_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deal_id');
            $table->unsignedBigInteger('product_id');
            $table->index('deal_id','deal_product_deal_idx');
            $table->index('product_id','deal_product_product_idx');

            $table->foreign('deal_id','deal_product_deal_fk')
                ->on('deals')->references('id');
            $table->foreign('product_id','deal_product_product_fk')
                ->on('products')->references('id');

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
        Schema::dropIfExists('deal_products');
    }
};
