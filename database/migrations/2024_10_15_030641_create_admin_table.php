<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Memeriksa apakah tabel 'admin' sudah ada
        if (!Schema::hasTable('admin')) {
            // Jika tabel belum ada, maka buat tabel 'admin'
            Schema::create('admin', function (Blueprint $table) {
                $table->id('id_admin'); // Primary key
                $table->string('nama', 50); // Kolom nama dengan panjang maksimum 50 karakter
                $table->string('email', 25)->unique(); // Kolom email dengan panjang maksimum 25 karakter
                $table->string('nomor_telepon', 15); // Kolom nomor telepon dengan panjang maksimum 15 karakter
                $table->text('alamat'); // Kolom alamat sebagai teks
                $table->date('tanggal_bergabung'); // Kolom tanggal bergabung sebagai tipe tanggal
                $table->unsignedBigInteger('id_user'); // Kolom foreign key untuk id_user
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // Menetapkan foreign key constraint
                $table->timestamps(); // Menambahkan kolom created_at dan updated_at
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
