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
        Schema::create('tech_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');            // "Backend", "Mobile", ...
            $table->string('slug')->unique();  // backend, mobile, data-cache, cloud-devops
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_groups');
    }
};
