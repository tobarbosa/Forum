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
        Schema::create('list_item', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alternative_titles')->nullable();
            $table->longText('summary')->nullable();
            $table->string('genres')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('CASCADE');
            $table->string('comments')->nullable();
            $table->boolean('active')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_item');
    }
};
