<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::create('specialties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('specialisation',30);
            $table->string('doctor_name',20);
            $table->string('address',100);
            $table->string('contact_number',15);
            $table->integer('added_by')->unsigned();
            $table->foreign('added_by')->references('id')->on('users');
            $table->enum('status', ['in', 'out']);
            $table->timestamps('modified_on');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('specialties');
    }
}
