<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

trait Response {
    public function success($data, $result = 'data') {
        return (object) [
            'status'        => 200,
            'message'       => 'Success',
            "$result"       => $data
        ];
    }

    public function serverError() {
        return (object) [
            'status'        => 500,
            'message'       => 'Internal server error'
        ];
    }

    public function notFound() {
        return (object) [
            'status'        => 400,
            'message'       => 'not found'
        ];
    }

    public function reportError($error) {
        Log::info('====================== ERROR ======================');
        Log::info('Date America/Caracas: ' . Carbon::now()->setTimezone('America/Caracas')->format('Y-m-d H:i:s'));
        Log::info('File: ' . $error->getFile());
        Log::info('Message: ' . $error->getMessage());
        Log::info('Line: ' . $error->getLine());
        Log::info('===================================================');
    }

    public static function validationFail($errors) {
        return response()->json([
        'status' => 302,
        'message' => 'Los campos no cumplen lo requerido',
        'detail' => $errors
        ]);
    }
}
