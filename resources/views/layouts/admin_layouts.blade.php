<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('Backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('Backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('Backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('Backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('Backend/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  @include('sweetalert::alert')
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('Backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        {{-- Logout  --}}
        <div>

          @if (!empty(Auth::user()->name))
              
          
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf

                     <x-dropdown-link :href="route('logout')" class=" mr-3 btn"
                             onclick="event.preventDefault();
                                         this.closest('form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>

                         
                     </x-dropdown-link>
                 </form>
                
                     
                 @else
                     
                
                 <a class="btn" href="{{route('login')}}"> <i class="fa fa-sign-in" aria-hidden="true" style="font-size: 20px"></i></a>
                 @endif
         </div>
      {{-- logut end --}}
        
      </li>
  
    </ul>
  </nav>
  <!-- /.navbar -->
  @php
  $siteData= App\Models\BlogFrontEnd::all()->first();
@endphp
   <title>{{$siteData->site_name}}</title>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route("home.index")}}" class="brand-link">
      <img src="{{asset($siteData->site_logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      
      <span class="brand-text font-weight-light">Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('Backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p >Dashboard</p>
              </a>
          </li>
          <li class="nav-item {{ (request()->is('admin/blogcategory/*')) ? 'menu-open' : '' }}" >
            <a href="#" class="nav-link " >
              <i class="nav-icon fas fa-th"></i>
              <p>
                Blog Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add.blog.category')}}" class="nav-link {{ (request()->is('admin/blogcategory/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list.blog.category')}}" class="nav-link {{ (request()->is('admin/blogcategory/list')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ (request()->is('admin/blog/tag/*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Blog  Tag
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add.blog.tag')}}" class="nav-link {{ (request()->is('admin/blog/tag/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tag Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list.blog.tag')}}" class="nav-link {{ (request()->is('admin/blog/tag/list')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tag List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ (request()->is('admin/blogpost/*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Blog Post
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add.blog.post')}}" class="nav-link {{ (request()->is('admin/blogpost/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Post Add</p>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('admin/blogpost/list')) ? 'active' : '' }}">
                <a href="{{route('list.blog.post')}}" class="nav-link {{ (request()->is('admin/blogpost/list')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Post List</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="{{route('add.blog.frontend')}}" class="nav-link {{ (request()->is('admin/blog/frontend/add')) ? 'active' : '' }}">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Front-End Detalis
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('admin/blog/follow/*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Follow Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{route('add.follow')}}" class="nav-link {{ (request()->is('admin/blog/follow/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Us Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list.follow')}}" class="nav-link {{ (request()->is('admin/blog/follow/list')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Us List</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="{{route('profile.edit')}}" class="nav-link {{ (request()->is('profile')) ? 'active' : '' }}">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Profile</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 ">@yield('heading')</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">








@yield('content')


  
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  
  <!-- jQuery -->
  <script src="{{asset('Backend/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('Backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('Backend/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('Backend/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('Backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('Backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('Backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('Backend/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('Backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('Backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('Backend/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('Backend/dist/js/demo.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('Backend/dist/js/pages/dashboard.js')}}"></script>
  </body>
  </html>