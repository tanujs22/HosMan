<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital', function (Blueprint $table) {
            $table->increments('id');
			$table->string('hospital_name',100);
			$table->string('hospital_address',100);
			$table->string('contact_number',15);
			$table->integer('bed_count');
			$table->string('latitude', 30, 10);
            $table->string('longitude', 30, 10);
			$table->integer('added_by')->unsigned();
			$table->foreign('added_by')->references('id')->on('users');
			$table->enum('status', ['active', 'inactive']);
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
        Schema::drop('hospital');
    }
}
