<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consoles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: PlayStation 5 Disc Edition
            $table->text('description');
            $table->integer('price_per_hour');
            $table->integer('price_per_day');
            $table->integer('stock'); // Jumlah unit yang tersedia
            $table->string('status')->default('available'); // available, unavailable
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consoles');
    }
};
