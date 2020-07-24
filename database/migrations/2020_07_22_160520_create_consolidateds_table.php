<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolidatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidateds', function (Blueprint $table) {
            $table->id();
            $table->double('score',2,1)->nullable();
            $table->foreignId('evaluation_criteria_id')->constrained();
            $table->foreignId('profile_id')->constrained();
            $table->foreignId('groups_id')->constrained();
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
        Schema::dropIfExists('consolidateds');
    }
}
