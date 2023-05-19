@extends('layouts.admin_layouts')
@section('title','List Follow')
@section('heading','List Follow')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Follow Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th >ID</th>
            <th>Follow Name</th>
            <th>Follow URL</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($follow_tag as $key=>$item)
          <tr>
            <td>{{$key+1}} </td>
            <td>{{$item->follow_name}}</td>
            <td>{{$item->follow_slug}}</td>
            <td>
                <a href="{{url('/admin/blog/follow/edit/'.$item->id)}}" class="btn btn-info"> Update</a> 
                <a href="{{url('/admin/blog/follow/del/'.$item->id)}}" class="btn btn-danger"> Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection