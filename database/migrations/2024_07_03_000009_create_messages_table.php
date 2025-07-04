<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // user yang chat
            $table->unsignedBigInteger('admin_id')->nullable(); // admin yang membalas
            $table->enum('sender', ['user', 'admin']);
            $table->text('message');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // admin_id bisa null, jika belum dibalas
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
}; 