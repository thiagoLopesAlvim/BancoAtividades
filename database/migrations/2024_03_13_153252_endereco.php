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

        Schema::create('endereco', function (Blueprint $table) {
            $table->id('id');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('cidade');
            $table->string('cep');
            $table->string('complemento');
            $table->string('estado');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
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
