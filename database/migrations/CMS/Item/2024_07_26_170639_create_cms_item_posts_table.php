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
        Schema::create('cms_item_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->timestamp('date');
            $table->string('desc');
            $table->text('content');
            $table->string('thumbnail');
            $table->enum('status', ['Draft', 'Published']);
            $table->json('data')->nullable();
            $table->foreignId('seo_id')->nullable()->constrained(table: 'cms_seo_settings')->onUpdate('cascade')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_item_posts');
    }
};
