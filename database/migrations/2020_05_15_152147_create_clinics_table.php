<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->integer('governorate_id');
            $table->integer('district_id');
            $table->string('address');
            $table->decimal('long',10,7);
            $table->decimal('lat',10,7);
            $table->enum('type',['clinic','hospital']);
            $table->float('regular_price');
            $table->float('urgent_price');
            $table->integer('phone');
            $table->integer('limit')->unsigned(); // the clinic capacity per day
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}
