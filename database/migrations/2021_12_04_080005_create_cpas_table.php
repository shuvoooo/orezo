<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpas', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['email','phone'])->nullable();
            $table->integer('min_question')->nullable();
            $table->integer('max_question')->nullable();
            $table->integer('phone_time')->default(0);
            $table->decimal('cost', 8, 2)->nullable();
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
        Schema::dropIfExists('cpas');
    }
}
