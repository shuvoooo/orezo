<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpouseInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spouse_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('ssn',100)->nullable();
            $table->string('marital_status',100)->nullable();
            $table->string('occupation',100)->nullable();
            $table->string('street_no',100)->nullable();
            $table->string('apartment_no',100)->nullable();
            $table->string('zip_code',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('mobile',100)->nullable();
            $table->string('work',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('visa_status',100)->nullable();
            $table->date('date_of_entry_in_us')->nullable();
            $table->string('year')->default(date('Y'))->nullable();
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
        Schema::dropIfExists('spouse_information');
    }
}
