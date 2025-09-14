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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('headline')->nullable();  // e.g. "Backend Engineer & Mobile Enthusiast"
            $table->text('bio')->nullable();
            $table->string('avatar_url')->nullable();    // URL/file path
            $table->string('location')->nullable();      // "Jakarta, Indonesia"
            $table->unsignedSmallInteger('years_experience')->default(0);
            $table->unsignedSmallInteger('projects_shipped')->default(0);
            $table->unsignedSmallInteger('industries_count')->default(0);
            $table->string('cv_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
