<?php

namespace App\Http\Controllers\Analyst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Traits\Response;

class EmployeeController extends Controller
{

    use Response;
    protected $validateRuleStore = [
        'name' => 'required|string',
        'last_name' => 'required|string',
        'dni' => 'required|string|unique:employees',
        'nacionality' => 'required|string',
        'date_admission' => 'required|date', 
        'phone'=>'required|string',
        'house_number' => 'required|string',
        'other_number' => 'nullable|string',
        'direction'=>'required|string',
        'other_direction'=>'nullable|string',
        'place_birth'=>'required|string',
        'birth_date'=>'required|date',
        'age'=> 'required|integer',
        'sex'=>'required|string',
        'left_handed'=> 'required|boolean',
        'right_handed'=> 'required|boolean',
        'height'=>'required|numeric|regex:/^[\d]{0,3}(\.[\d]{1,2})?$/', /* 0 to 3 digits y 2 opciones decimales */
        'weight'=>'required|numeric|regex:/^[\d]{0,3}(\.[\d]{1,2})?$/',
        'status_civil'=> 'required|in:single,married,widow',

        // 'job_id'=>
        // 'education_id',
        // 'course_id',
        // 'work_performance_id',
        // 'reference_id',
        // 'dependent_id',
        // 'status'=> 'required|in:active,inactive'

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $employees = Employee::all();
            
        } catch (\Exception $e) {
            $this->reportError($e);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($employees, 'employees'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->validator($request->all(), $this->validateRuleStore, class_basename($this));

        if ($validator->fails()) {
            return $this->validationFail($validator->errors());
        }
        try {
            $employee = Employee::create($request->all());
            
        } catch (\Exception $e) {
            $this->reportError($e);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($employee, 'employee'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $employee = Employee::find($id);
            
        } catch (\Exception $e) {
            $this->reportError($e);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($employee, 'employee'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = $this->validator($request->all(), $this->validateRuleStore, class_basename($this));

        if ($validator->fails()) {
            return $this->validationFail($validator->errors());
        }
        try {
            $employee = Employee::find($id);
            if (!empty($employee)) {
                $employee->update($request->all());
            }
            
        } catch (\Exception $e) {
            $this->reportError($e);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($employee, 'employee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);
            if (!empty($employee)) {
                $employee->delete();
            }
        } catch (\Exception $e) {
            $this->reportError($e);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($employee, 'employee'));
    }
}
