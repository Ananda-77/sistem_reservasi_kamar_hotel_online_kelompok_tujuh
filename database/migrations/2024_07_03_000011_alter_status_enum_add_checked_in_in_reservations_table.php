<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'confirmed', 'checked_in', 'cancelled', 'checked_out'])->change();
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'checked_out'])->change();
        });
    }
}; 