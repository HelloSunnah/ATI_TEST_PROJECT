<?php

namespace App\Http\Controllers\Backend;

use App\Models\Employee;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
  

    public function summaryReport()
    {
        $totalEmployees = Employee::count();
        $totalSalary = Employee::sum('salary');

        return view('backend/reports/summary_report', [
            'totalEmployees' => $totalEmployees,
            'totalSalary' => $totalSalary,
        ]);
    }
}


