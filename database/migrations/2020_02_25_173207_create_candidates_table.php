<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('e_id');
            $table->string('name');
            $table->string('m_name');
            $table->string('f_name');
            $table->integer('d_o_b');
            $table->string('image');
            $table->integer('contact');
            $table->string('address');
            $table->string('aducation');
            $table->text('about');
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
        Schema::dropIfExists('candidates');
    }
}
