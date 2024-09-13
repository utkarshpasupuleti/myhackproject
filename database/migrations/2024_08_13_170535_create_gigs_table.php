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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->string("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->unsignedBigInteger('gig_id')->unique();
            $table->text('gigdesc');
            $table->unsignedBigInteger('category');
            $table->text('subcategories'); // Store as JSON
            $table->text('minisubcategories'); // Store as JSON
            $table->text('miniminisubcategories'); // Store as JSON
            $table->string('searchTags');
            $table->string('declaration');
            $table->text('gig_description_summary');
            $table->text('additional_details');
            $table->string('video')->nullable(); // Store the file path
            $table->json('images')->nullable(); // Store JSON array of image paths
            $table->json('documents')->nullable(); // Store JSON array of document paths
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs');
    }
};
