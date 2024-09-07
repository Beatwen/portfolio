<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->json('brief_description')->nullable();
            $table->string('github_url')->nullable();
            $table->string('project_url')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string("image")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
