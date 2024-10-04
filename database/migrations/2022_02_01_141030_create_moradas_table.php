<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moradas', function (Blueprint $table) {
            $table->id();
            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('bairro')->nullable();
            $table->string('rua')->nullable();
            $table->string('residencia')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moradas');
    }
}
