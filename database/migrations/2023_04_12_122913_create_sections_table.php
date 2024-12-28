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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('order')->default(1);
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->enum('type', ['content', 'header_section', 'home_contact', 'team_partner', 'requestService', 'team', 'partner', 'three_column', 'home_about', 'service_section', 'contact_info'])->default('content');

            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('background_color')->nullable();
            $table->string('background_image')->nullable();
            $table->string('section_margin_top')->nullable();
            $table->string('icon')->nullable();
            $table->string('width')->enum('type', ['box', 'full'])->default('full');
            $table->string('image')->nullable();
            $table->string('image_frame')->nullable();
            $table->string('image_position')->nullable();

            $table->string('col_icon_1')->nullable();
            $table->string('col_icon_2')->nullable();
            $table->string('col_icon_3')->nullable();
            $table->string('col_background_1')->nullable();
            $table->string('col_background_2')->nullable();
            $table->string('col_background_3')->nullable();
            $table->longText('col_1')->nullable();
            $table->longText('col_2')->nullable();
            $table->longText('col_3')->nullable();
            $table->longText('col_title_1')->nullable();
            $table->longText('col_title_2')->nullable();
            $table->longText('col_title_3')->nullable();
            $table->string('buton_txt')->nullable();
            $table->string('button_url')->nullable();
            $table->tinyInteger('status')->default(1); // 1 active 0 not active
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
        Schema::dropIfExists('sections');
    }
};
