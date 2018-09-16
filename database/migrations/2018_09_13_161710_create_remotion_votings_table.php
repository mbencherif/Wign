<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemotionVotingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remotion_votings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'remotion_id' )->unique();
            $table->integer( 'user_id' )->unique();
            $table->boolean( 'approve' )->nullable($value = true);
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
        Schema::dropIfExists('remotion_votings');
    }
}