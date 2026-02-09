<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('seo_data', function (Blueprint $table) {
            $table->id();
            $table->string('page_type');
            $table->string('page_id')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->text('twitter_description')->nullable();
            $table->timestamps();
            
            $table->unique(['page_type', 'page_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo_data');
    }
};