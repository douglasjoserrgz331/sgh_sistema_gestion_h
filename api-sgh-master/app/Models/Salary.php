<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};
class Salary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'salary',
        'date',
        'employee_id'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
