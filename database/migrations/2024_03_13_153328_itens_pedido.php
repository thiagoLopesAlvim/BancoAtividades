<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {       
        Schema::create('itensPedido', function (Blueprint $table) {
            $table->id('id');
            $table->integer('quantidade');
            $table->float('valor');
            $table->date('dt_item');
            $table->foreignId('produto_id')->constrained('produto', 'id')->onDelete('cascade');
            $table->foreignId('pedido_id')->constrained('pedido', 'id')->onDelete('cascade');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
