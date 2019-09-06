<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cases_no', 100);
            $table->integer('disease_id')->unsigned();
            $table->integer('symptom_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('status')->nullable();

            // $table->engine = 'InnoDB';
        });

        Schema::table('cases', function($table) {
            $table->foreign('disease_id')->references('id')->on('diseases');
            $table->foreign('symptom_id')->references('id')->on('symptoms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cases');
    }
}
