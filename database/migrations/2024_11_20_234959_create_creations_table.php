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
        Schema::create('creations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Colonne pour lier à l'utilisateur
            $table->string('name_todo');
            $table->text('description_todo');
            $table->dateTime("start");
            $table->dateTime("end");
            $table->string('priority_todo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creations');
    }
};
