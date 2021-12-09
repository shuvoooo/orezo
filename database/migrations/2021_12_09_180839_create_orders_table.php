<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreignId('cpa_id')->nullable()->constrained('cpas');
            $table->string('email')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->integer('status')->default(0);
            $table->integer('payment_status')->default(0);
            $table->integer('phone_time')->default(0);
            $table->string('phone_text');
            $table->string('invoice_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
