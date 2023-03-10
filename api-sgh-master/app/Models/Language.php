<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};

class Language extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'speak',
        'read',
        'write',
        'name_institution',
        'employee_id',
        'scholarship'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
