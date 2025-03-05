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
        Schema::create('website_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('about_us')->nullable();
            $table->longText('privacy_policy')->nullable();
            $table->longText('help_center')->nullable();
            $table->longText('cookie_policy')->nullable();
            $table->longText('referral_program')->nullable();
            $table->longText('terms_of_use')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_pages');
    }
};
