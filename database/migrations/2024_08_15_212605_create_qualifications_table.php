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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('Tile1');
            $table->text('Tile_description1');
            $table->string('Tile2')->nullable();
            $table->text('Tile_description2')->nullable();
            $table->string('Tile3')->nullable();
            $table->text('Tile_description3')->nullable();
            $table->string('Tile4')->nullable();
            $table->text('Tile_description4')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video_link')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
