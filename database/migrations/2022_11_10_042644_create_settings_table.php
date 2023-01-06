<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name_website')->nullable();
            $table->string('url_website')->nullable();
            $table->string('page_title')->nullable();
            $table->string('keywords')->nullable();
            $table->text('about')->nullable();
            $table->text('description_website')->nullable();
            $table->string('phone_website')->nullable();
            $table->string('email_website')->nullable();
            $table->string('wa_website')->nullable();
            $table->string('address_website')->nullable();
            $table->string('fb_website')->nullable();
            $table->string('ig_website')->nullable();
            $table->string('youtube_website')->nullable();
            $table->string('twitter_website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};