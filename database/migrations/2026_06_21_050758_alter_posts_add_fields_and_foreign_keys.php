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
        // Add missing columns and foreign keys to existing posts table
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }

            if (!Schema::hasColumn('posts', 'thumbnail')) {
                $table->string('thumbnail')->nullable()->after('content');
            }

            if (!Schema::hasColumn('posts', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('status');
            }

            if (!Schema::hasColumn('posts', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('user_id');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            }

            // Add foreign key constraint for user_id -> users.id (cascade)
            try {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            } catch (\Exception $e) {
                // ignore if FK cannot be created (already exists or other issue)
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }

            if (Schema::hasColumn('posts', 'slug')) {
                // drop unique index then column
                $table->dropUnique('posts_slug_unique');
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('posts', 'thumbnail')) {
                $table->dropColumn('thumbnail');
            }

            if (Schema::hasColumn('posts', 'published_at')) {
                $table->dropColumn('published_at');
            }

            // drop user_id foreign if present
            try {
                $table->dropForeign(['user_id']);
            } catch (\Exception $e) {
                // ignore if FK not present
            }
        });
    }
};
