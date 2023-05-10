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
            <th>Post Name</th>
            <th>Post Autor</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($blog_post as $key=>$item)
          <tr> 
            <td>{{$key+1}} </td>
            <td>{{$item->blog_title}}</td>
            <td>{{ $item->user_name}}</td>
            <td>
                <a href="{{url('/admin/blogpost/edit/'.$item->id)}}" class="btn btn-info"> Update</a> 
                <a href="{{url('/admin/blogpost/del/'.$item->id)}}" class="btn btn-danger"> Delete</a>
                <a href="{{url('/admin/blogpost/preview/'.$item->post_slug)}}" class="btn btn-primary"> view</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection