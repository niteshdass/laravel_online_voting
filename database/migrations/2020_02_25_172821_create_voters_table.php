<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('e_id');
            $table->string('name');
            $table->string('m_name');
            $table->string('f_name');
            $table->integer('d_o_b');
            $table->string('image');
            $table->integer('contact');
            $table->string('gmail');
            $table->string('password');
            $table->integer('birth_c_n');
            $table->integer('allow_status')->define(0);
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
        Schema::dropIfExists('voters');
    }
}
