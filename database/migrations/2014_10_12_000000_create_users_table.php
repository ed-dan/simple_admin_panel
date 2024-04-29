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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token');
            $table->rememberToken();

            $table->unsignedBigInteger('position_id')->default('1');
            $table->unsignedBigInteger("task_id")->nullable();
            $table->unsignedBigInteger("lead_id")->nullable();
            $table->index('task_id','employee_task_idx');
            $table->index('lead_id','employee_lead_idx');

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
        Schema::dropIfExists('users');
    }
};
