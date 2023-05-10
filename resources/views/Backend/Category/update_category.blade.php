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
          <form action="{{url('/admin/blogcategory/edit/'.$editData->id)}}" method="POST">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="up_category">Category Name</label>
                <input type="text" class="form-control" value="{{$editData->category_name}}" name="update_category_name" id="up_category" placeholder="Enter Category Name">
              </div>
              <div class="form-group">
                <label for="up_category">Category Description</label>
                <input type="text" class="form-control" value="{{$editData->category_des}}" name="update_category_des" id="up_category" placeholder="Enter Category Name">
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