@extends('layouts.admin_layouts')
@section('title','Add Follow')
@section('heading','Add Follow')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Follow Inset Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
            <form action="{{route('store.follow')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="follow_name">Follow Name</label>
                <input type="text" class="form-control" name="follow_name" id="follow_name" placeholder="Enter Category Name">
                @if ($errors->has('follow_name'))
                     <p class=" text-danger">{{ $errors->first('follow_name') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="follow_slug">Follow Slug</label>
                <input type="text" class="form-control" name="follow_slug" id="follow_slug" placeholder="Enter Category Slug">
                @if ($errors->has('follow_slug'))
                     <p class=" text-danger">{{ $errors->first('follow_slug') }}</p>
                @endif
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