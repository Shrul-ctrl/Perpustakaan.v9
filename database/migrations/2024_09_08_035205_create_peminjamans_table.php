<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->unsignedBigInteger('id_buku');  
            $table->string('jumlah_pinjam');
            $table->date('tanggal_pinjam');
            $table->date('batas_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status_pengajuan', ['ditahan', 'diterima', 'ditolak','dipinjam','dikembalikan','sukses'])->default('ditahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamens');
    }
};
