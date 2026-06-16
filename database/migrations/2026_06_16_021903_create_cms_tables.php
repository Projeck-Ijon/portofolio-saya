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
        // Settings Table (for general texts and base64 assets)
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->timestamps();
        });

        // Skills Table
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // frontend, backend, devops
            $table->integer('percentage')->default(100);
            $table->timestamps();
        });

        // Projects Table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('tags'); // e.g. "Laravel, Vue"
            $table->longText('image_base64')->nullable();
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->timestamps();
        });

        // Experiences Table
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('period'); // e.g. "2023 - Sekarang"
            $table->string('title');
            $table->string('company');
            $table->text('description')->nullable();
            $table->string('type')->default('work'); // work, education, certification
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('settings');
    }
};
