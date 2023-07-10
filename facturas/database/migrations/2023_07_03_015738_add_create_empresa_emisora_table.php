<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('empresa_emisora', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('correo_contacto')->unique();
            $table->string('rfc_emiso');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('empresa_emisora');
    }
};
