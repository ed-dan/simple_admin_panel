<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("priority");
            $table->string("title");
            $table->string("subject");
            $table->string("notes_id");
            $table->date("deadline");
            $table->unsignedBigInteger("deal_id");
            $table->unsignedBigInteger("employee_id");
            $table->index('employee_id','employee_task_idx');
            $table->index('deal_id','deal_task_idx');
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('employee_id', 'employee_task_fk')
                ->references('task_id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
