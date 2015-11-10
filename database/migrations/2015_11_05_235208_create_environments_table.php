<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environments', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'name', 2048 );
            $table->string( 'path', 2048 );
            $table->string( 'repo', 4096 );
            $table->string( 'branch', 128 )->default( 'master' );
            $table->integer( 'project_id' )->unsigned();
            $table->foreign( 'project_id' )->references( 'id' )->on( 'projects' );
            $table->integer( 'server_id' )->unsigned();
            $table->foreign( 'server_id' )->references( 'id' )->on( 'servers' );
            $table->string( 'token', 2048 );
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
        Schema::drop('environments');
    }
}
