<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->onDelete('cascade');  // Clé étrangère pour relier avec `groups`
            $table->string('email');  // L'email de l'utilisateur invité
            $table->enum('status', ['pending', 'accepted', 'refused'])->default('pending');  // Le statut de l'invitation
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
