<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};

class WorkPerformance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'phone_number',
        'last_supervisor',
        'charge_executed',
        'remuneration',
        'description_activities',
        'reason_termination',
        'last_job',
        'penultimate_job',
        'second_last_job',
        'from',
        'untill',
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
