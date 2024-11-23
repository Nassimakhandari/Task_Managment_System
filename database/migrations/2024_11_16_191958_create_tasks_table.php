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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('start');
            $table->date('end');
            $table->enum('priority', ['Low', 'Medium', 'High']);
            $table->foreignId('assignee_id')->nullable()->constrained('users');
            $table->enum('status', ['To Do', 'In Progress', 'Done']);
            $table->foreignId("group_id")->constrained("groups")->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained();
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



