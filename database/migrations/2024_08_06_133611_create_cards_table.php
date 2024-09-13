<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table -> string("gig_id");
            $table->text('description');
            $table->float('rating', 2, 1);
            $table->decimal('price', 8, 2);
            $table->json('images'); // Stores URLs or paths to images
            $table->json('videos'); // Stores URLs or paths to videos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
