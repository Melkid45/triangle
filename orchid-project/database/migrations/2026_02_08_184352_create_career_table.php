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
        Schema::create('career', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->json('poster')->nullable();
            $table->string('employment')->nullable();
            $table->string('role')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->date('job')->nullable();

            $table->date('summary_description')->nullable();

            $table->json('responsibilities')->nullable();

            $table->json('qualifications')->nullable();

            $table->string('perks_description')->nullable();
            $table->json('perks_list')->nullable();
            
            $table->string('common_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career');
    }
};
