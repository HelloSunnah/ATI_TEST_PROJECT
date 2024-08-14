<?php

namespace App\Http\Controllers\Backend;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DepartmentController extends Controller
{
   
        // Display a listing of the departments
        public function index()
        {
            $departments = Department::all();
            return view('backend.department.index', compact('departments'));
        }
    
        // Show the form for creating a new department
        public function create()
        {
            return view('backend.department.create');
        }
    
        // Store a newly created department in storage
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            $department = new Department();
            $department->name = $request->name;
            $department->save();
            sweetalert('Department Created Successfully!');

    
            return redirect()->route('departments.index');
        }
    
        // Show the form for editing the specified department
        public function edit($id)
        {
            $department = Department::findOrFail($id);
            return view('backend.department.edit', compact('department'));
        }
    
        // Update the specified department in storage
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            $department = Department::findOrFail($id);
            $department->name = $request->name;
            $department->save();
            sweetalert('Department Update Successfully!');

    
            return redirect()->route('departments.index');
        }
    
        // Remove the specified department from storage
        public function destroy($id)
        {
            $department = Department::findOrFail($id);
            $department->delete();
            sweetalert('Ooopss! Department  Deleted');

        
            return redirect()->route('departments.index');
        }
    
    
    public function showDepartmentEmployees()  
    {
    $departments = Department::all();
    return view('backend.department_view.department_employees', compact('departments'));
    }

    public function getDepartmentEmployees(Request $request)
    {
    $department = Department::with('employees')->find($request->department_id);

    if ($department && $department->employees->count()) {
        return view('backend.department_view.view_employee_table', compact('department'))->render();
    } else {
        return '<h5 class="text-center">No employees found in this department.</h5>';
    }
}}