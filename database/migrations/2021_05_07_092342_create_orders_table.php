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
            $table->foreignId('user_id')->constrained('users')->onDeleteCascade();
            $table->string('ip_address')->nullable();
            $table->string('name');
            $table->string('phone_no');
            $table->text('shipping_addresss');
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);

         
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
