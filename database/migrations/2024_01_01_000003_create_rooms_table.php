<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tipe');
            $table->decimal('harga', 12, 2);
            $table->enum('status', ['tersedia', 'terisi'])->default('tersedia');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('rooms');
    }
}; 