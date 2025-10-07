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
        Schema::create('registrasi_events', function (Blueprint $table) {
            $table->id();
            $table->string('kode_registrasi')->unique();
            $table->string('kode_event');
            $table->foreign('kode_event')->references('kode_event')->on('events')->onDelete('cascade');
            $table->string('nama');
            $table->string('nama_optik');
            $table->string('email');
            $table->string('no_whatsapp');
            $table->string('wilayah');
            $table->enum('kategori', ['pengurus', 'anggota', 'visitor'])->default('visitor');
            $table->boolean('kehadiran')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_events');
    }
};
