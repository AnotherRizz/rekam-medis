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
        Schema::create('pembayarans', function (Blueprint $table) {
    $table->id();
    $table->string('kode_bayar')->unique();
    $table->foreignId('pemeriksaan_id')->constrained()->onDelete('cascade');
    $table->decimal('biaya_periksa', 10, 2);
    $table->decimal('biaya_obat', 10, 2);
    $table->date('tgl_bayar');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};