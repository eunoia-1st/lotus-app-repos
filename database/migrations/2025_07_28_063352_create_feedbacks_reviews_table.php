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
        Schema::create('feedbacks_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
                ->constrained('admins')
                ->onDelete('cascade');
            $table->foreignId('feedback_id')
                ->constrained('feedbacks')
                ->onDelete('cascade');
            $table->enum('tag', [
                'normal',
                'urgent',
                'needs follow-up',
                'resolved',
            ])->default('normal');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks_reviews');
    }
};
