<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            // Nullable para que los productos antiguos no den error al migrar
            $table->string('codigo_barras')->nullable()->unique();
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            // Es importante agregar esto para poder revertir si te equivocas
            $table->dropColumn('codigo_barras');
        });
    }
};
