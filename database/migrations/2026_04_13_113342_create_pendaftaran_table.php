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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_siswa_id')->constrained('calon_siswa')->onDelete('cascade');

            // Data formulir
            $table->string('asal_sekolah');
            $table->string('nilai_rapor')->nullable();

            // Upload berkas
            $table->string('file_ijazah')->nullable();
            $table->string('file_kk')->nullable();
            $table->string('file_akta')->nullable();

            // Status verifikasi
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');

            $table->timestamps();

            $table->foreignId('jalur_id')->constrained('jalur_pendaftaran')->onDelete('cascade');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
