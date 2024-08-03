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
        Schema::create('user_ideas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Removed foreign key constraint
            $table->text('idea');
            $table->string('photo')->nullable();
            $table->string('link')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_ideas');
    }
};
