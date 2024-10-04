<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->double('preco', 10, 2)->default(0.00);
            $table->integer('quantidade')->unsigned()->default(0);
            $table->double('peso', 10, 2)->default(0.00);
            $table->string('dimensoes');
            $table->string('foto');
            $table->unsignedBigInteger('loja_id')->nullable()->default(12);
            $table->unsignedBigInteger('categoria_id')->nullable()->default(12);

            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
}
