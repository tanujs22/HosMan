<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
			$table->string('doctor_name',20);
			$table->string('address',100);
			$table->string('contact_number',15);
			$table->string('specialisation',30);
			$table->integer('associated_with')->unsigned();
			$table->foreign('associated_with')->references('id')->on('hospital');
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
        Schema::drop('doctors');
    }
}
