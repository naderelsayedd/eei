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

        if (config('dashboard.enable_services') != true) {
            return true;
        }
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('shortdescription')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('icon')->nullable();
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
        if (config('dashboard.enable_services') != true) {
            return true;
        }
        Schema::dropIfExists('services');
    }
};
