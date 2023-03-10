<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();

            $table->string('instruction_level');
            $table->string('institution_name');
            $table->string('especiality');
            $table->integer('coursed_years');
            $table->date('start_date');
            $table->date('completion_date');
            $table->enum('study',['primary','secondary','higher_education', 'postgraduate_course', 'masters_degree']);


            $table->softDeletes();
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
        Schema::dropIfExists('education');
    }
};
