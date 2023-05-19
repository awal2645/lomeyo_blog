@extends('layouts.admin_layouts')
@section('title','My Category')
@section('heading','Add Category')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title t">Category Inset Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
            <form action="{{route('store.blog.category')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="category">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category" placeholder="Enter Category Name">
              </div>
              <div class="form-group">
                <label for="category_slug">Category Slug</label>
                <input type="text" class="form-control" name="category_slug" id="category_slug" placeholder="Enter Category Slug">
              </div>
              <div class="form-group">
                <label class="" for="flexCheckDefault">
                  Featured Category
                </label>
                <br>
                <input type="checkbox" name="featured"  id="flexCheckDefault">
              </div>
              <div class="form-group">
                <label for="category_img">Category Image</label>
                <input type="file" class=" btn" name="category_img" id="category_img" required>
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