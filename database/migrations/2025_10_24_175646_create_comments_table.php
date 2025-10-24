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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->string('author_name');
            $table->string('author_email');
            $table->string('author_website')->nullable();
            $table->longText('content');
            $table->string('status')->default('pending');
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');
            $table->timestamps();

            $table->index('post_id');
            $table->index('status');
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
