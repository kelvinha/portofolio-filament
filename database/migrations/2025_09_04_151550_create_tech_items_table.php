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
        Schema::create('tech_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tech_group_id')->constrained()->cascadeOnDelete();
            $table->string('name');  // "Go (Gin)", "Laravel", "Flutter", "Redis", etc.
            $table->string('icon_url')->nullable();  // URL ikon
            $table->boolean('is_featured')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_items');
    }
};
