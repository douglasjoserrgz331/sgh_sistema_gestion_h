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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('last_name');
            $table->string('dni')->unique();
            $table->string('nacionality');
            $table->date('date_admission');
            $table->string('phone');
            $table->string('house_number');
            $table->string('other_number')->nullable();
            $table->text('direction');
            $table->text('other_direction')->nullable();
            $table->string('place_birth');
            $table->date('birth_date');
            $table->integer('age');
            $table->string('sex');
            $table->boolean('left_handed');
            $table->boolean('right_handed');
            $table->decimal('height',8,2);
            $table->decimal('weight',8,2);
            $table->enum('status_civil',['single', 'married', 'widow']);
            $table->enum('status',['active', 'inactive']);

            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('education_id')->constrained('education');
            $table->foreignId('course_id')->nullable()->constrained('courses');
            $table->foreignId('work_performance_id')->nullable()->constrained('work_performances');
            $table->foreignId('reference_id')->nullable()->constrained('personal_references');
            $table->foreignId('dependent_id')->constrained('dependents');

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
        Schema::dropIfExists('employees');
    }
};
