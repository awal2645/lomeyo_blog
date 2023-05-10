@extends('layouts.admin_layouts')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Bordered Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th >ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($category as $key=>$item)
          <tr>
            
            <td>{{$key+1}} </td>
            <td>{{$item->category_name}}</td>
            <td>{{$item->category_des}}</td>
            <td>
                <a href="{{url('/admin/blogcategory/edit/'.$item->id)}}" class="btn btn-info"> Update</a> 
                <a href="{{url('/admin/blogcategory/del/'.$item->id)}}" class="btn btn-danger"> Delete</a>
            </td>
           
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection