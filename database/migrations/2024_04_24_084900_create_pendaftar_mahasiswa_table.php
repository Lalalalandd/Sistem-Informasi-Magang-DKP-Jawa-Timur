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
        Schema::create('pendaftar_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_kelompok_1')->nullable();
            $table->string('nama_kelompok_2')->nullable();
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('surat_pengantar');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('surat_balasan')->nullable();
            $table->string('surat_keterangan')->nullable();
            $table->string('sertifkiat')->nullable();
            $table->string('penerimaan')->default('diproses');
            $table->string('sub_bagian');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar_mahasiswas');
    }
};
