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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('email')
                ->unique();
            $table->string('phone')->nullable();
            $table->text('about')
                ->nullable();
            $table->string('address')
                ->nullable();
            $table->string('company_name')->nullable();
            $table->string('short_description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('path_image')
                ->nullable();
            $table->string('path_image_header')
                ->nullable();
            $table->string('path_image_footer')
                ->nullable();
            $table->string('instagram_link')->default('-')->nullable();
            $table->string('twitter_link')->default('-')->nullable();
            $table->string('fanpage_link')->default('-')->nullable();
            $table->string('google_plus_link')->default('-')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
