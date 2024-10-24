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
        Schema::table('family_members', function (Blueprint $table) {
            $table->unsignedBigInteger('ayah_id')->nullable()->after('hubungan_keluarga');
            $table->unsignedBigInteger('ibu_id')->nullable()->after('ayah_id');

            $table->foreign('ayah_id')->references('id')->on('family_members')->onDelete('cascade');
            $table->foreign('ibu_id')->references('id')->on('family_members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('family_members', function (Blueprint $table) {
            $table->dropForeign(['ayah_id']);
            $table->dropForeign(['ibu_id']);
            $table->dropColumn(['ayah_id', 'ibu_id']);
        });
    }
};
