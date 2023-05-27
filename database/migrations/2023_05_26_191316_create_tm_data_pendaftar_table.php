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
        Schema::create('tm_data_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('nim')->default('Dari Luar');
            $table->string('no_telepon');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('ukuran_baju',3);
            $table->string('alamat');
            $table->string('image_url', 255);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_data_pendaftar');
    }
};
