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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();

        $table->string('title');

        $table->enum('status', ['a_faire', 'en_cours', 'termine'])
              ->default('a_faire');

        $table->enum('priority', ['basse', 'moyenne', 'haute'])
              ->default('moyenne');

        $table->foreignId('project_id')->constrained('projects');

        $table->foreignId('assigned_to')
              ->nullable()
              ->constrained('users');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
