@extends('layouts.admin_layouts')
@section('content')
@section('title','Dashboard')
@section('heading','Dashboard')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$total_post->count()}}</h3>

              <p>Total Post
              </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
              {{-- <i class="ion ion-bag"></i> --}}
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_like->count()}}</h3>

                <p>Total Like</p>
            </div>
            <div class="icon">
              

              <i class="ion ion-heart"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$total_comment->count()}}</h3>

              <p>Total Comment</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatbox"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$total_user->count()}}</h3>

                <p>Total User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
@endsection