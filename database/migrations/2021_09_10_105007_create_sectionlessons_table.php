<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionlessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectionlessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section');
            $table->foreign('section')->references('id')->on('course_sections');
            $table->text('title');
            $table->text('duration');
            $table->text('video_url');
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
        Schema::dropIfExists('sectionlessons');
    }
}
