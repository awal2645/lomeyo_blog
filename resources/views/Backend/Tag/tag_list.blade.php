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
            <th>Tag Name</th>
            <th>Tag Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tag as $key=>$item)
          <tr>
            <td>{{$key+1}} </td>
            <td>{{$item->tag_name}}</td>
            <td>{{$item->tag_slug}}</td>
            <td>
                <a href="{{url('/admin/blog/tag/edit/'.$item->id)}}" class="btn btn-info"> Update</a> 
                <a href="{{url('/admin/blog/tag/del/'.$item->id)}}" class="btn btn-danger"> Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection