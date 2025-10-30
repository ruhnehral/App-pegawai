<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->decimal('gaji_pokok', 15, 2)->change();
            $table->decimal('tunjangan', 15, 2)->nullable()->change();
            $table->decimal('potongan', 15, 2)->nullable()->change();
            $table->decimal('total_gaji', 15, 2)->change();
        });
    }

    public function down(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->integer('gaji_pokok')->change();
            $table->integer('tunjangan')->nullable()->change();
            $table->integer('potongan')->nullable()->change();
            $table->integer('total_gaji')->change();
        });
    }
};
