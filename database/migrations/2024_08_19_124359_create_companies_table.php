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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('logo')->nullable();
            $table->text('address')->nullable();
            $table->json('phone')->nullable(); // Assuming phone is stored as an array of multiple contacts
            $table->string('main_contact')->nullable();
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('map')->nullable();
            $table->text('opens_from')->nullable(); // Change to text
            $table->text('ends_in')->nullable(); // Change to text
            $table->time('opens_at')->nullable();
            $table->time('ends_at')->nullable();
            $table->string('copyright')->nullable();
            $table->timestamps();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->json('phone')->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
