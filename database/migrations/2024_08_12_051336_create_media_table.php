<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passedaway_id')->constrained('passedaways')->onDelete('cascade');
            $table->string('title');
            $table->text('summary')->nullable();
            $table->string('type'); // 'image' or 'video'
            $table->string('file_path')->nullable(); // for storing image file path
            $table->string('video_url')->nullable(); // for storing video URL
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
        Schema::dropIfExists('media');
    }
}
