<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentQuestionsTable extends Migration
{

    public function up()
    {
        Schema::create('parent_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('process_id');
            $table->string('pq_name');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('parent_questions');
    }
}
