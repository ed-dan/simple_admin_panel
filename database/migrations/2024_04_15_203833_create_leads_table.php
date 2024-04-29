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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->unsignedBigInteger("phone");
            $table->string("source");
            $table->unsignedBigInteger("employee_id")->nullable();
            $table->index('employee_id','employee_lead_idx');

            $table->timestamps();
        });

        Schema::table('deals', function (Blueprint $table) {
            $table->foreign('lead_id', 'deal_lead_fk')
                ->references('id')
                ->on('leads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
