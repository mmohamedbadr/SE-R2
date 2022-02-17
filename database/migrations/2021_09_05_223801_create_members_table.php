<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->enum('gender', ['male', 'female']);
            $table->string('nationality')->nullable();
            $table->integer('id_no')->nullable();
            $table->string('mobile');
            $table->date('birth_date')->nullable();
            $table->binary('image_id')->nullable();
            $table->binary('id_copy')->nullable();
            $table->text('note');
            $table->boolean('is_active');
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
        Schema::dropIfExists('members');
    }
}
