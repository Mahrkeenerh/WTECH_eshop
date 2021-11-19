<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable(false);
            $table->string('password_hash')->nullable();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('street_and_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false);
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->bigInteger('category_id')->nullable(false);
            $table->string('image_100_path')->nullable(false);
            $table->string('image_200_path')->nullable(false);
            $table->string('image_500_path')->nullable(false);
            $table->float('price')->nullable(false);
            $table->integer('sale')->nullable(false);
            $table->text('description')->nullable(false);
            $table->json('info_json')->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->bigInteger('parent')->nullable();
            $table->string('image_path')->nullable(false);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false);
            $table->string('shipping_type')->nullable(false);
            $table->float('shipping_price')->nullable(false);
            $table->string('payment_type')->nullable(false);
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable(false);
            $table->integer('amount')->nullable(false);
            $table->float('unit_price')->nullable(false);
            $table->bigInteger('item_id')->nullable(false);
            $table->timestamps();
        });


        // Add reference keys
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent')->references('id')->on('categories');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('items');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
}
