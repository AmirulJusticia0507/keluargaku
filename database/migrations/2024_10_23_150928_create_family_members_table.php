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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('hubungan_keluarga');
            $table->unsignedBigInteger('ayah_id')->nullable(); // Kolom untuk ayah
            $table->unsignedBigInteger('ibu_id')->nullable();  // Kolom untuk ibu
            $table->foreign('ayah_id')->references('id')->on('family_members')->onDelete('cascade');
            $table->foreign('ibu_id')->references('id')->on('family_members')->onDelete('cascade');
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
        Schema::dropIfExists('family_members');
    }
};
