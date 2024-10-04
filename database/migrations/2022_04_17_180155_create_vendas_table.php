<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('loja_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->boolean('aprovada')->default(false);
            $table->enum('pagamento', ['COD', 'Gateway']);
            $table->double('total', 10, 2);
            $table->string('endereco');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
