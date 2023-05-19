@extends('layouts.admin_layouts')
@section('title','Update Tag')
@section('heading','Update Tag')
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
                <label for="tag_name">Tag Name</label>
                <input type="text" class="form-control" value="{{$editData->tag_name}}" name="tag_name" id="tag_name" placeholder="Enter Tag Name">
                @if ($errors->has('tag_name'))
                <p class=" text-danger">{{ $errors->first('tag_name') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="tag_slug">Tag Slug</label>
                <input type="text" class="form-control" value="{{$editData->tag_slug}}" name="tag_slug" id="tag_slug" placeholder="Enter Tag Slug">
                @if ($errors->has('tag_slug'))
                <p class=" text-danger">{{ $errors->first('tag_slug') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="tag_des">Category Description</label>
                <input type="text" class="form-control" value="{{$editData->tag_des}}" name="tag_des" id="tag_des" placeholder="Enter Tag Description">
              </div>
            <!-- /.card-body -->

            <div class="">
              <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
  </div>
@endsection