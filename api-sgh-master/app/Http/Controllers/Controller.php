<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function validator($data, $validationData, $nameController)
    {
    $customMessages = [
    'required' => $nameController . 'Validator: :El atributo es requerido.',
    'integer' => $nameController . 'Validator: :El atributo debe ser entero',
    'string' => $nameController . 'Validator: :El atributo debe ser texto.',
    'boolean' => $nameController . 'Validator: :El atributo debe ser booleano.',
    'numeric' => $nameController . 'Validator: :El atributo debe ser numérico.',
    'date' => $nameController . 'Validator: :El atributo debe ser de tipo fecha: "Y/M/D".',
    'date' => $nameController . 'Validator: :El atributo debe ser de tipo fecha: "Y/M/D".',
    'mimes' => 'Sólo se permiten archivos de tipo: :values',
    'file.max' => 'El :attribute supera el máximo permitido de :max KB',
    ];
    return Validator::make($data, $validationData, $customMessages);
}
}
