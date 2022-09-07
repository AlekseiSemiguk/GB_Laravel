<?php

use App\Models\News;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)
                ->nullable();
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');
            $table->foreignId('news_source_id')
                ->constrained('news_sources')
                ->onDelete('cascade');
            $table->string('title', 255);
            $table->string('author', 255)->nullable();
            $table->enum('status', [
                News::DRAFT, News::ACTIVE, News::BLOCKED
            ])->default(News::DRAFT);
            $table->string('image', 255)->nullable();
            $table->text('anonce')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('date');
            $table->timestamps();
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
