@extends('layouts.admin_layouts')
@section('title','Add Tag')
@section('heading','Add Tag')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tag Inset Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
            <form action="{{route('store.blog.tag')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="tag_name">Tag Name</label>
                <input type="text" class="form-control" name="tag_name" id="tag_name" placeholder="Enter Category Name">
                @if ($errors->has('tag_name'))
                <p class=" text-danger">{{ $errors->first('tag_name') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="tag_slug">Tag Slug</label>
                <input type="text" class="form-control" name="tag_slug" id="tag_slug" placeholder="Enter Category Slug">
                @if ($errors->has('tag_slug'))
                <p class=" text-danger">{{ $errors->first('tag_slug') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="tag_des">Tag Description</label>
                <input type="text" class="form-control" name="tag_des" id="tag_des" placeholder="Enter Category Description">
              </div>
            <!-- /.card-body -->
      
            <div class="">
              <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
          </form>
          </div>
      </div>
       
  </div>
@endsection