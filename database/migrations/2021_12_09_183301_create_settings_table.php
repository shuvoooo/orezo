<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('app_title')->nullable();
            $table->string('app_email')->nullable();
            $table->string('app_telephone')->nullable();
            $table->enum('paypal_type',['test','live']);
            $table->boolean('paypal_active')->default(true);
            $table->string('paypal_email1')->nullable();
            $table->string('api_username1')->nullable();
            $table->string('api_password1')->nullable();
            $table->string('signature1')->nullable();
            $table->string('paypal_email2')->nullable();
            $table->string('api_username2')->nullable();
            $table->string('api_password2')->nullable();
            $table->string('signature2')->nullable();
            $table->string('paypal_email3')->nullable();
            $table->string('api_username3')->nullable();
            $table->string('api_password3')->nullable();
            $table->string('signature3')->nullable();

            $table->string('paypal_email4')->nullable();
            $table->string('api_username4')->nullable();
            $table->string('api_password4')->nullable();
            $table->string('signature4')->nullable();

            $table->string('paypal_email5')->nullable();
            $table->string('api_username5')->nullable();
            $table->string('api_password5')->nullable();
            $table->string('signature5')->nullable();

            $table->boolean('database_offline')->default(false);
            $table->boolean('status')->default(false);
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
