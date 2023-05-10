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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('header_title')->unique();
            $table->string('header_img');
            $table->string('read_time');
            $table->integer('category_id')->unsigned();
            $table->string('user_name');
            $table->string('blog_title');
            $table->string('blog_article');
            $table->string('post_slug');
            $table->string('featured')->nullable();
            $table->integer('status');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};