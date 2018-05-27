<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->nullable();
            $table->text('site_url')->nullable();
            $table->text('site_logo_header')->nullable();
            $table->text('site_logo_footer')->nullable();
            $table->string('site_slogan')->nullable();
            $table->text('site_full_address_local')->nullable();
            $table->text('site_full_address_international')->nullable();
            $table->text('site_state_country')->nullable();
            $table->string('site_main_number')->nullable();
            $table->string('site_whatsapp_number')->nullable();
            $table->string('site_international_number')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_facebook')->nullable();
            $table->string('site_twitter')->nullable();
            $table->string('site_instagram')->nullable();
            $table->string('site_youtube')->nullable();
            $table->string('site_pinterest')->nullable();
            $table->text('site_about')->nullable();
            $table->text('site_mission')->nullable();
            $table->text('site_vision')->nullable();
            $table->text('site_overview')->nullable();
            $table->text('site_client_description')->nullable();
            $table->text('site_work_days')->nullable();
            $table->string('site_featured_image')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
