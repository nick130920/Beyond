<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_type')->constrained();
            $table->bigInteger('id_number')->unique();
            $table->string('first_name', 30);
            $table->string('second_name', 30);
            $table->string('first_surname', 30);
            $table->string('second_surname', 30);
            $table->foreignId('users')->constrained()->onDelete("cascade")->onUpdate("cascade");



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
        Schema::dropIfExists('profiles');
    }
}
