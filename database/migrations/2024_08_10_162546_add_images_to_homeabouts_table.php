<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('homeabouts', function (Blueprint $table) {
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
        });
    }

    public function down()
    {
        Schema::table('homeabouts', function (Blueprint $table) {
            $table->dropColumn('image1');
            $table->dropColumn('image2');
        });
    }
};
