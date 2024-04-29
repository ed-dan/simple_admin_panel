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
        Schema::create('employee_leads', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('lead_id');
            $table->index('employee_id','employee_lead_employee_idx');
            $table->index('lead_id','employee_lead_lead_idx');

            $table->foreign('lead_id','employee_lead_employee_fk')
                ->on('leads')->references('id');
            $table->foreign('employee_id','employee_lead_lead_fk')
                ->on('users')->references('id');

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
        Schema::dropIfExists('employee_leads');
    }
};
