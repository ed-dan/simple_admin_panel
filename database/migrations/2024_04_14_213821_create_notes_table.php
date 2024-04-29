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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("deal_id");
            $table->text("description");
            $table->index('deal_id','note_deal_idx');
            $table->timestamps();
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('deal_id', 'note_deal_fk')
                ->references('note_id')
                ->on('deals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
