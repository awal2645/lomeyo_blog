@extends('layouts.admin_layouts')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Inset Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
          <form action="{{url('/admin/blog/tag/edit/'.$editData->id)}}" method="POST">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="update_tag_name">Tag Name</label>
                <input type="text" class="form-control" value="{{$editData->tag_name}}" name="update_tag_name" id="update_tag_name" placeholder="Enter Tag Name">
              </div>
              <div class="form-group">
                <label for="update_tag_slug">Tag Slug</label>
                <input type="text" class="form-control" value="{{$editData->tag_slug}}" name="update_tag_slug" id="update_tag_slug" placeholder="Enter Tag Slug">
              </div>
              <div class="form-group">
                <label for="update_tag">Category Description</label>
                <input type="text" class="form-control" value="{{$editData->tag_des}}" name="update_tag" id="update_tag" placeholder="Enter Tag Description">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
  </div>
@endsection