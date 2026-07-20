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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ketua_peneliti_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('judul');
            $table->text('abstrak');

            $table->string('skema');
            $table->string('bidang_fokus');
            $table->string('kata_kunci');

            $table->year('tahun_pengajuan');
            $table->date('tanggal_pengajuan');
            $table->date('target_selesai');

            $table->tinyInteger('progress')->default(0);

            $table->decimal('total_dana', 15, 2)->default(0);

            $table->enum('status', [
                'draft',
                'diajukan',
                'review_lppm',
                'review_ketua_stt',
                'revisi',
                'disetujui',
                'ditolak',
                'selesai'
            ])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
