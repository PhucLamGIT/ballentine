<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_name', 100);
            $table->string('customer_phone', 50);
            $table->string('customer_email', 100)->unique();
            $table->string('customer_password');
            $table->string('customer_address', 250);
            $table->integer('customer_district');
            $table->integer('customer_city');
            $table->string('customer_note')->nullable();
            $table->integer('customer_type');
            $table->tinyInteger('customer_status')->index()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
