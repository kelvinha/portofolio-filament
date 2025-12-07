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
        Schema::table('projects', function (Blueprint $table) {
            $table->year('year')->after('title')->nullable();
            $table->dropColumn('sort_order');
            $table->index(['project_category_id', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->unsignedSmallInteger('sort_order')->default(0)->after('is_featured');
            $table->index(['project_category_id', 'sort_order']);
        });
    }
};
