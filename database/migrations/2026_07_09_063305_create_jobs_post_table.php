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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title', 100);
            $table->string('slug', 100)->unique();
            $table->string('job_type', 100);
            $table->string('location',100);
            $table->string('salary',100)->nullable();
            $table->string('experience')->nullable();
            $table->string('deadline')->nullable();
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->boolean('status')->default(true);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
