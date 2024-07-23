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
            $table->unsignedBigInteger('periode_magang_id');
            $table->unsignedBigInteger('sub_bagian_id');
            $table->unsignedBigInteger('universitas_id');
            $table->string('nama_kelompok_1')->nullable();
            $table->string('nama_kelompok_2')->nullable();
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('surat_pengantar');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('surat_balasan')->nullable();
            $table->string('surat_keterangan')->nullable();
            $table->string('sertifkiat')->nullable();
            $table->string('penerimaan')->default('diproses');
            $table->timestamps();
            
            $table->foreign('periode_magang_id')->references('id')->on('periode_magang')->onDelete('cascade');
            $table->foreign('sub_bagian_id')->references('id')->on('sub_bagian')->onDelete('cascade');
            $table->foreign('universitas_id')->references('id')->on('universitas')->onDelete('cascade');
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
