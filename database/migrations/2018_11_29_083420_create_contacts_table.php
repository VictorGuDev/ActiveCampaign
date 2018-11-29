<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ac_id');
            $table->string('email', 50);
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('phone', 20);
            $table->ipAddress('ip');
            $table->string('tags', 100);
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
        Schema::dropIfExists('contacts');
    }
}
