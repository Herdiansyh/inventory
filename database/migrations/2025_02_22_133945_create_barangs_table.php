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
            $table->string('nama_barang');
            $table->string('merk');
            $table->string('kategori');
            $table->string('sub_kategori');
            $table->string('ukuran');
            $table->string('satuan');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->decimal('jumlah');
            $table->decimal('harga_modal');
            $table->decimal('harga_jual');
            $table->string('foto_barang');
            $table->string('deskripsi');
            $table->timestamps();
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
