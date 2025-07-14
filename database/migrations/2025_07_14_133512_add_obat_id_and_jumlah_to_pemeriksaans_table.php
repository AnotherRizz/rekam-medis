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
    Schema::table('pemeriksaans', function (Blueprint $table) {
        $table->foreignId('obat_id')->nullable()->constrained()->onDelete('set null');
        $table->integer('jumlah')->default(1);
    });
}

public function down(): void
{
    Schema::table('pemeriksaans', function (Blueprint $table) {
        $table->dropColumn(['obat_id', 'jumlah']);
    });
}
};