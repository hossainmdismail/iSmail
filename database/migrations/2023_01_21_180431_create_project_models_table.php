<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_models', function (Blueprint $table) {
            $table->id();
            $table->integer('categoryId');
            $table->string('photo');
            $table->string('thumbnail');
            $table->string('title');
            $table->string('clientName');
            $table->dateTime('startingDate')->nullable();
            $table->dateTime('endDate')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('shortDescription')->nullable();
            $table->longText('longDescription')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('project_models');
    }
};
