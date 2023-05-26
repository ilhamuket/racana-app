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
        Schema::create('tm_data_article', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->foreignId('categories_id')->constrained('tm_ref_category');
            $table->foreignId('created_by')->constrained('users');
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('views');
            $table->string('image_url', 255);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_data_article');
    }
};
