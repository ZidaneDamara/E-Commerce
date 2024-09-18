<?php

// database/migrations/xxxx_xx_xx_create_customers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('phone_number');
            $table->string('postal_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}