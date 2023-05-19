@extends('layouts.admin_layouts')
@section('title','Update Category')
@section('heading','Update Category')
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
          <form action="{{url('/admin/blogcategory/edit/'.$editData->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" value="{{$editData->category_name}}" name="category_name" id="category_name" placeholder="Enter Category Name">
              </div>
              <div class="form-group">
                <label for="category_slug">Category Slug</label>
                <input type="text" class="form-control" value="{{$editData->category_slug}}" name="category_slug" id="category_slug" placeholder="Enter Category Name">
              </div>
              <div class="form-group">
                <label class="" for="flexCheckDefault">
                  Featured Category
                </label>
                <br>
                <input type="checkbox" name="featured" @if ($editData->featured==1)
                    checked
                @endif  id="flexCheckDefault">
              </div>
              <div class="form-group">
                <label for="category_img">Category Image</label>
                <input type="file" class=" btn" name="category_img" id="category_img" >
                <input type="hidden" name="category_img_name"  value="{{asset($editData->category_img)}}"  >
                <img src="{{asset($editData->category_img) }}" class="img-fluid img-thumbnail" width="150">
              </div>

            <!-- /.card-body -->

            <div class="">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
  </div>
@endsection