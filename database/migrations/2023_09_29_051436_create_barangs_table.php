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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_barang_id');
            $table->string('kode')->unique();
            $table->string('bahan_baku');
            $table->string('satuan');
            $table->integer('stock');
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('kategori_barang_id')->references('id')->on('kategori_barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
