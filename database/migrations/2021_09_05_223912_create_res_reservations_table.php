<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('from');
            $table->dateTime('to');
            $table->integer('band_id');
            $table->integer('hall_id');
            $table->integer('category_id');
            $table->integer('group_id');
            $table->boolean('is_paid');
            $table->enum('status', ['pending', 'canceled', 'active']);
            $table->text('note');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_reservations');
    }
}
