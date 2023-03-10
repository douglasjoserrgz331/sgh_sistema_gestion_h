<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'nacionality',
        'date_admission',
        'phone',
        'house_number',
        'other_number',
        'direction',
        'other_direction',
        'place_birth',
        'birth_date',
        'age',
        'sex',
        'left_handed',
        'right_handed',
        'height',
        'weight',
        'status_civil',
        'job_id',
        'education_id',
        'course_id',
        'work_performance_id',
        'reference_id',
        'dependent_id',
        'status'
    ];


    public function job(){
        return $this->belongsTo(Job::class);
    }


    public function education(){
        return $this->belongsTo(Education::class);
    }
    

    public function salary(){
        return $this->hasOne(Salary::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function workPerformance() {
        return $this->belongsTo(WorkPerformance::class);
    }

    public function personalReference() {
        return $this->belongsTo(personalReference::class);
    }

    public function dependent() {
        return $this->belongsTo(dependent::class);
    }

    public function languages(){
        return $this->hasMany(Language::class);
    }


    }

