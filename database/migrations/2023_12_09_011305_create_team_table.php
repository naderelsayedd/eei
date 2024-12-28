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
        if(config('dashboard.enable_team') != true){
            return true;
        }
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('job_title')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('teams');
    }
};
