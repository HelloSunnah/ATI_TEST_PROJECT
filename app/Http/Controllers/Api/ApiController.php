<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            $employee = Employee::all();

            if ($employee) {
                return response()->json($employee);
            } else {
                return response()->json(['message' => 'Employee not found'], 404);
            }
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
