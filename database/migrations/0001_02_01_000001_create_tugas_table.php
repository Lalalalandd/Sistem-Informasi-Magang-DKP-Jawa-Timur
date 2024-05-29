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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dinas_id');
            $table->unsignedBigInteger('user_id');
            $table->string('tugas');
            $table->date('tgl_diberikan');
            $table->date('tgl_dikumpulkan');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('dinas_id')->references('id')->on('dinas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
