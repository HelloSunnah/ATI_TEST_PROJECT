@extends('backend.master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Employee Details</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset($employee->image) }}" alt="Employee Image" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $employee->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $employee->phone }}</td>
                        </tr>
                        <tr>
                            <th>Department:</th>
                            <td>{{ $employee->department->name }}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{ $employee->gender }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $employee->address }}</td>
                        </tr>
                        <tr>
                            <th>Salary:</th>
                            <td>{{ $employee->salary }}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{ $employee->gender }}</td>
                        </tr>
                        <tr>
                            <th>Date of Joining:</th>
                            <td>{{ \Carbon\Carbon::parse($employee->joindate)->format('d  M  Y') }}</td>

                        </tr>
                    </table>
                    <div class="text-center mt-4">
                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> 
                        </a>
                        <a href="{{ route('employee.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection