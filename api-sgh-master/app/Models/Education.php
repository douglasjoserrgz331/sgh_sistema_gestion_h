<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};
class Education extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'instruction_level',
        'institution_name',
        'especiality',
        'coursed_years',
        'start_date',
        'completion_date',
        'study',
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
