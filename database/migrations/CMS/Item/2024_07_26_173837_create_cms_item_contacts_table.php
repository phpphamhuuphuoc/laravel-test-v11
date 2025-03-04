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
        Schema::create('cms_item_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('admin_comment')->nullable();
            $table->json('data')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_item_contacts');
    }
};
