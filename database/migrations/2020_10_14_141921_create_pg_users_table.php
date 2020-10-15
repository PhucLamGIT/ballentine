<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePgUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pg_users', function (Blueprint $table) {
            $table->increments('pg_id');
            $table->string('pg_name', 100);
            $table->string('pg_phone', 50);
            $table->string('pg_email', 100)->unique();
            $table->string('pg_password');
            $table->tinyInteger('pg_status')->index()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pg_users');
    }
}
