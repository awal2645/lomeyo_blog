@extends('layouts.admin_layouts')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Category Inset Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
            <form action="{{route('store.blog.category')}}" method="POST">
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
                <label for="category_des">Category Description</label>
                <input type="text" class="form-control" name="category_des" id="category_des" placeholder="Enter Category Description">
              </div>
            <!-- /.card-body -->
      
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
      </div>
       
  </div>
@endsection