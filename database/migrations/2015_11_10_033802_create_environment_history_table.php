<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'environment_id' )->unsigned();
            $table->enum( 'status', [ 'success', 'fail' ] );
            $table->text( 'history' );
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
        Schema::drop('environment_history');
    }
}
