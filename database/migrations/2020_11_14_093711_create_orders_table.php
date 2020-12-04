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
            $table->increments('id');
            $table->timestamp('ordered_at')->nullable();
            $table->decimal('price', 12, 2);
            $table->text('first_name');
            $table->text('last_name');
            $table->text('street');
            $table->text('city');
            $table->text('postal_code');
            $table->text('email');
            $table->text('phone');
            $table->integer('delivery_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->integer('user_id')->nullable();
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
