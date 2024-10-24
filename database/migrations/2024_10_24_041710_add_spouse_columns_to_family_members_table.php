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
            $table->foreignId('suami_id')->nullable()->constrained('family_members')->onDelete('set null');
            $table->foreignId('istri_id')->nullable()->constrained('family_members')->onDelete('set null');
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
            $table->dropForeign(['suami_id']);
            $table->dropForeign(['istri_id']);
            $table->dropColumn(['suami_id', 'istri_id']);
        });
    }
};
