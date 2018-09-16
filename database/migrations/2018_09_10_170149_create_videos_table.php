<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'user_id' );
            $table->integer( 'post_id' );
            $table->string( 'video_uuid' )->unique();
            $table->string( 'camera_uuid' );
            $table->string( 'recorded_from' );
            $table->string( 'video_url' );
            $table->string( 'thumbnail_url' );
            $table->string( 'small_thumbnail_url' );
            $table->integer( 'playings' );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}