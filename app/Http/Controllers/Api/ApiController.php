<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
       public function index()
    {
        // Fetch all employees from the database
        $employees = Employee::all();

        return response()->json($employees);
    }
}
