@extends('backend.master')
@section('content')
<div class="pagetitle">
  <h1>Employee Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Employee</li>
      <li class="breadcrumb-item active">List</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Employees</h5>
          <a href="{{route('employee.create')}}" class="btn btn-primary">Create New Employee .<i class="fa-sharp fa-solid fa-user-plus"></i></a>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>
                  <b>N</b>ame
                </th>
                <th>Phone</th>
                <th>Email</th>
                <th data-type="date" data-format="YYYY/DD/MM">join Date</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $item)
              <tr>
                <td>
                  <div class="d-flex justify-content-between">
                    <img src="{{ asset($item->image) }}" alt="" width="50" height="50">
                    <p> {{$item->name}}</p>
                  </div>
                </td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->joindate}}</td>
                <td>{{$item->address}}</td>
                <td>
                <a href="{{route('employee.edit',$item->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route('employee.show',$item->id)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                <form action="{{ route('employee.delete', $item->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection