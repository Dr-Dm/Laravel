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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('category_id')
//                ->references('id')
//                ->on('categories');
//            $table->foreignId('source_id')
//                ->references('id')
//                ->on('news_sources');
            $table->string('title', 250);
            $table->string('author', 100);
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
