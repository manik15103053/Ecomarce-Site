<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDeleteCascade();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDeleteCascade();
            $table->foreignId('order_id')->nullable()->constrained('orders')->onDeleteCascade();
            $table->string('ip_address')->nullable();
            $table->integer('product_quantity')->default(1);
            
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
        Schema::dropIfExists('carts');
    }
}
