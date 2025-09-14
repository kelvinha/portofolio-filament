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
         Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('role')->nullable();             // "Backend Lead", dst
            $table->string('hero_image_url')->nullable();   // card & modal
            $table->longText('description_html')->nullable(); // HTML aman dari admin
            $table->string('live_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['project_category_id','sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
