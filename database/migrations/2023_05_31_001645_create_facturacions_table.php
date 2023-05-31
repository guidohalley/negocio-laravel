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
        Schema::create('facturacions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('producto');
            $table->string('unidad');
            $table->float('precio', 8, 2);
            $table->float('subtotal', 8, 2);
            $table->float('total', 8, 2);
            $table->string('conidicionfrentealiva');
            $table->string('cuit');
            $table->string('cuil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturacions');
    }
};
