<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sectionlessons', function (Blueprint $table) {
            // $table->unsignedBigInteger('author');
            // $table->foreign('author')->references('id')->on('teachers');
            // $table->unsignedBigInteger('course');
            // $table->foreign('course')->references('id')->on('courses');
            // $table->text('description');
            // $table->enum('level', ['Beginner', 'Intermdiate', "Advanced"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sectionlessons', function (Blueprint $table) {
            // Schema::dropColumns('author');
            // Schema::dropColumns('course');
            // Schema::dropColumns('description');
        });
    }
}
