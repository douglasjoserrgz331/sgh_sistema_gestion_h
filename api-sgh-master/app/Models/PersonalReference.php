<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};

class PersonalReference extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'last_name',
        'ocupation',
        'direction',
        'phone_number',
    ];
    
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
