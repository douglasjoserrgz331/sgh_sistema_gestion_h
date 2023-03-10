<?php

namespace App\Http\Controllers\Analyst;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Traits\Response;

class DepartmentController extends Controller
{
    use Response;
    protected $validateRuleStore = [
        'name' => 'required|string'
    ];
    
    public function index()
    {
        try {
            $department = Department::all();
            
        } catch (\Exception $d) {
            $this->reportError($d);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($department, 'departments'));
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
            $department =Department::create($request->all());
            
        } catch (\Exception $d) {
            $this->reportError($d);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($department, 'department'));
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
            $department =Department::find($id);
            
        } catch (\Exception $d) {
            $this->reportError($d);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($department, 'department'));
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
            $department = Department::find($id);
            if (!empty($department)) {
                $department->update($request->all());
            }
            
        } catch (\Exception $d) {
            $this->reportError($d);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($department, 'department'));
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
            $department = Department::find($id);
            if (!empty($department)) {
                $department->delete();
            }
        } catch (\Exception $d) {
            $this->reportError($d);
            return response()->json($this->serverError());
        }
        return response()->json($this->success($department, 'department'));
    }
}