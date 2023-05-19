@extends('layouts.admin_layouts')
@section('title','Add Post')
@section('heading','Add Post')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> Blog Post Inset Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
            <form action="{{route('store.blog.post')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="header_title"> Blog Header Title</label>
                <input type="text" class="form-control" name="header_title" {{old('header_title')}} id="header_title" placeholder="Enter Header Title" required>
              </div>
              <div class="form-group">
                <label for="header_img"> Blog Header Iamge</label>
                <input type="file" class=" btn" name="header_img" id="header_img" required>
              </div>
              <div class="form-group">
                <label for="read_time"> Blog Read Time </label>
                <input type="text" class="form-control" name="read_time" id="read_time" placeholder="Enter Aprox Blog Reading Time " required>
              </div>
             
              <div class="form-group">
                <label for="read_time"> Category Select </label>
              <select class="form-control select2 select2-hidden-accessible" name="category_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
               @foreach ($cat as $item)
               
                <option selected="selected" data-select2-id="3" value="{{$item->id}}"> {{$item->category_name}}</option>
                   
                @endforeach
              </select>
              </div>
              <div class="form-group">
                <label for="blog_title"> Blog Title </label>
                <input type="text" class="form-control" name="blog_title" id="blog_title" placeholder="Enter Blog Title " required>
              </div>
              <div class="form-group">
                <label for="blog_article"> Blog Article </label>
                <input type="text" class="form-control" name="blog_article"  id="blog_article" placeholder="Enter Blog Article " required>
              </div>
              <div class="form-group">
                <label for="blog_title"> Blog Tag </label>
                @foreach ($tag as $item)
                <div class="custom-control custom-checkbox">
                  <input class=" custom-control-input" name="tag_id[]" type="checkbox" value="{{$item->id}}" id="tagid{{$item->id}}">
                  <label class=" custom-control-label" for="tagid{{$item->id}}" >
                    {{$item->tag_name}}
                  </label>
                </div>
                @endforeach
              </div>
              <div class="form-group">
                <label for="post_slug">Blog Post Slug</label>
                <input type="text" class="form-control" name="post_slug" id="post_slug" placeholder="Enter post Slug" required>
                @if ($errors->has('post_slug'))
                <p class=" text-danger">{{ $errors->first('post_slug') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label class="" for="flexCheckDefault">
                  Featured Post
                </label>
                <br>
                <input type="checkbox" name="featured"  id="flexCheckDefault">
              </div>
              <div class="form-group">
                <label for="read_time"> Status Select </label>
              <select class="form-control select2 select2-hidden-accessible" name="status" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>   
                <option selected="selected" data-select2-id="3" value="0">Active</option>
                <option  value="1">Inactive</option>
              </select>
              </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="textarea" style="width: 730px; height: 200px" required></textarea>
            </div>  

            <input type="hidden" name="user_name" value="{{Auth::user()->name }}" >

   
            <!-- /.card-body -->
      
            <div class="">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
      </div>
       
  </div>
@endsection