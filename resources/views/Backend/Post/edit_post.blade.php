@extends('layouts.admin_layouts')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> Update Blog Post Inset Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6  offset-lg-3 col-end-8 offset-md-2">
            <form action="{{url('/admin/blogpost/edit/'.$edit_post->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="header_title"> Blog Header Title</label>
                <input type="text" class="form-control" value="{{$edit_post->header_title}}" name="header_title" id="header_title" placeholder="Enter Header Title" required>
              </div>
              <div class="form-group">
                <label for="header_img"> Blog Header Iamge</label>
                <input type="file" class=" btn" name="header_img" accept="image/*" value="{{$edit_post->header_img}}" id="header_img" placeholder="Enter post Name" required>
                <img src="{{asset($edit_post->header_img) }}" class="img-fluid img-thumbnail" width="150">
            </div>
              <div class="form-group">
                <label for="read_time"> Blog Read Time </label>
                <input type="text" class="form-control" name="read_time" value="{{$edit_post->read_time}}" id="read_time" placeholder="Enter Aprox Blog Reading Time " required>
              </div>
              <div class="form-group">
                <label for="read_time"> Category Select </label>
              <select class="form-control select2 select2-hidden-accessible" name="category_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                <option selected="selected" data-select2-id="3" value="{{$edit_post->category_id}}" class="btn- btn-info"> {{$edit_post->category->category_name}}</option>
                @foreach ($cat as $item)
                <option  data-select2-id="3" value="{{$item->id}}"> {{$item->category_name}}</option>
                @endforeach
              </select>
              </div>
              <div class="form-group">
                <label for="blog_title"> Blog Title </label>
                <input type="text" class="form-control" name="blog_title" value="{{$edit_post->blog_title}}" id="blog_title" placeholder="Enter Blog Title " required>
              </div>
              <div class="form-group">
                <label for="blog_article"> Blog Article </label>
                <input type="text" class="form-control" name="blog_article" value="{{$edit_post->blog_article}}" id="blog_article" placeholder="Enter Blog Article " required>
              </div>
              <div class="form-group">
                <label for="blog_title"> Blog Tag </label>
                @foreach ($tag as $item)
                <div class="custom-control custom-checkbox">
                  <input class=" custom-control-input" name="tag_id[]" type="checkbox" value="{{$item->id}}" id="tagid{{$item->id}}"
                  @foreach ($edit_post->tag as $i)
                  @if ($item->id == $i->id) 
                      checked
                  @endif
                  @endforeach
                 
                  >
                  <label class=" custom-control-label" for="tagid{{$item->id}}" >
                    {{$item->tag_name}}
                  </label>
                </div>
                @endforeach
              </div>
              <div class="form-group">
                <label for="post_slug">Blog Post Slug</label>
                <input type="text" class="form-control" name="post_slug" value="{{$edit_post->post_slug}}" id="post_slug" placeholder="Enter post Slug" required>
              </div>
              <div class="form-group">
                <label for="read_time"> Featured Select </label>
              <select class="form-control select2 select2-hidden-accessible" name="featured" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>   
                <option selected="selected"  value="0">No</option>
                <option  @if ($edit_post->featured==1)selected="selected"@endif value="1">Yes</option>
              </select>
              </div>
              <div class="form-group">
                <label for="read_time"> Status Select </label>
              <select class="form-control select2 select2-hidden-accessible" name="status" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>   
                <option selected="selected" data-select2-id="3" value="0">Active</option>
                <option  @if ($edit_post->status==1)selected="selected"@endif value="1">Inactive</option>
              </select>
              </div>            
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="textarea" style="width: 730px; height: 200px"value="" required>{{$edit_post->description}}</textarea>
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