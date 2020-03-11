<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->string('user_id');
            $table->string('category_id');
            $table->date('contact_date');
            $table->date('evaluation_date');
            $table->string('msisdn');
            $table->string('week');
            $table->string('accurate_wrap');
            $table->string('wrong_wrap');
            $table->text('remarks');
            $table->string('tenure');
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
        Schema::dropIfExists('basic_responses');
    }
}
