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
        Schema::create('work_performances', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('phone_number');
            $table->string('last_supervisor');
            $table->string('charge_executed');
            $table->decimal('remuneration',13,2);
            $table->text('description_activities');
            $table->text('reason_termination');
            $table->string('last_job');
            $table->string('penultimate_job')->nullable();
            $table->string('second_last_job')->nullable();
            $table->date('from');
            $table->date('untill');

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
        Schema::dropIfExists('work_performances');
    }
};
