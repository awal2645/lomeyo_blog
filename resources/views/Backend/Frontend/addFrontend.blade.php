@extends('layouts.admin_layouts')
@section('title','Frontend Setting')
@section('heading','Frontend Setting')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Website Additional Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
            <form action="{{url('/admin/blog/frontend/edit/'.$siteData->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="site_name">Website  Name</label>
                <input type="text" class="form-control" name="site_name" value="{{$siteData->site_name ?: "no have site name" }}" id="site_name" placeholder="Enter Category Name">
              </div>
              <div class="form-group">
                <label for="site_logo">Website  Logo</label>
                <input type="file" class="form-control btn" value="{{$siteData->site_logo}}" name="site_logo" id="site_logo" placeholder="Enter Category Name">
                <input type="hidden" value="{{$siteData->site_logo}}" name="site_logo_name" >
                <img src="{{asset($siteData->site_logo) }}" class="img-fluid img-thumbnail" width="150">
              </div>
              <div class="form-group">
                <label for="site_slider">Website  Slider</label>
                <input type="file" class="form-control btn" name="site_slider" value="{{$siteData->site_slider }}" id="site_slider" placeholder="Enter Category Name">
                <input type="hidden" value="{{$siteData->site_slider}}" name="site_slider_name" >
                <img src="{{asset($siteData->site_slider) }}" class="img-fluid img-thumbnail" width="150">

            </div>
            <div class="form-group">
              <label for="site_slider">Website  Description</label>
              <input type="text" class="form-control" name="site_description" value="{{$siteData->site_description }}" id="site_slider" placeholder="Enter Description ">
    

          </div>
            <div class="form-group">
              <button type="submit" class=" form-control btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
      </div>  
  </div>
@endsection