<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->date('published_date');
            $table->decimal('deadline');
            $table->string('short_explanation', 60);
            $table->timestamps();

            $table->integer('techset_id')->unsigned()->index();
            $table->foreign('techset_id')->references('id')->on('techset');
            $table->integer('files_array_id')->unsigned()->index();
            $table->foreign('files_array_id')->references('id')->on('file');
            $table->integer('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
