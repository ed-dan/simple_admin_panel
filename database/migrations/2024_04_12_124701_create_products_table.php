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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("deal_id")->nullable();
            $table->string('title');
            $table->unsignedBigInteger("identifier")->unique();
            $table->unsignedBigInteger("company_id");
            $table->unsignedBigInteger("category_id");
            $table->timestamps();
            $table->index('company_id','product_company_idx');
            $table->index('deal_id','deal_product_idx');

        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('company_id', 'product_company_fk')
                ->references('id')
                ->on('companies');
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
};
