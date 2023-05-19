<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="{{asset('Fontend')}}/dist/css/vendor/bootstrap.min.css">

    <!-- Slick CSS Link -->
    <link rel="stylesheet" href="{{asset('Fontend')}}/dist/css/vendor/slick.css">
    <link rel="stylesheet" href="{{asset('Fontend')}}/dist/css/vendor/slick-theme.css">

    <!-- Icon Library Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Theme CSS Link -->
    <link rel="stylesheet" href="{{asset('Fontend')}}/dist/css/main.css">
<!-- Share JS -->
<script src="{{ asset('js/share.js') }}"></script>
@php
   $siteData= App\Models\BlogFrontEnd::all()->first();
@endphp
    <title>{{$siteData->site_name}}</title>
</head>

<body>
    <!-- Header Starts Here -->
    <header>
        <div class="container">
            <div class="header">
                <!-- Logo Starts Here -->
                <a href="{{route("home.index")}}">
                  <img src="{{asset($siteData->site_logo)}}" alt="" width="120" height="40">
                </a>
                <!-- Logo Ends Here -->

                <!-- Mobile Menu Starts Here -->
                <div class="menu-btn">
                    <div class="menu-btn-lines">

                    </div>
                </div>
                <!-- Mobile Menu Ends Here -->

                <!-- Menu Starts Here -->
                <div class="main-menu d-none d-lg-flex">
                    <ul class="main-menu-items list-unstyled">
                        <li><a href="{{route('home.index')}}" class="main-menu-item {{ (request()->is('/')) ? 'active-item' : '' }}">Home</a></li>
                        {{-- <li><a href="{{route('all.post')}}" class="main-menu-item {{ (request()->is('all')) ? 'active-item' : '' }}">All</a></li> --}}
                       @php
                           $cat=App\Models\BlogCategory::all() 
                       @endphp 
                        @foreach ($cat as $item)
                    
                        <li><a href="{{url('post/category/'.$item->category_slug)}}" class="main-menu-item {{ (request()->is('post/category/'.$item->category_slug)) ? 'active-item' : '' }} ">{{$item->category_name}}</a></li>
                    
                        @endforeach
                    </ul>
                   
                        <div class="header-searchbar">
                            <form action="{{ route('search') }}" method="GET" role="search">
                            <input type="search" name="search" placeholder="Search here..." value="{{ request('search') }}">
                          
                            </form>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <div>

                         @if (!empty(Auth::user()->name))
                             
                         
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" class=" mr-3"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                        <i class="fa fa-sign-out" aria-hidden="true"></i>

                                        
                                    </x-dropdown-link>
                                   @if(Auth::user()->is_admin==0)
                                    <a href="{{route('admin')}}" class="">
                                        <i class="fa fa-tachometer" aria-hidden="true" style="font-size: 20px"></i>
    
                                    </a>
                                    @else
                                    <a href="{{route('profile.edit')}}" class=" ml-2">
                                        <i class="fa fa-user" aria-hidden="true"></i>
    
                                    </a>
                                    @endif
                                </form>
                              
                                    
                                @else
                                    
                           

                                <a class="btn" href="{{route('login')}}"> <i class="fa fa-sign-in" aria-hidden="true" style="font-size: 20px"></i></a>
                     

                                @endif
                        </div>
                </div>
                <!-- Menu Items Ends Here -->
            </div>
        </div>
    </header>
    <script>
        $('#fire').on('click', function (e) {

//your awesome code here

})
        </script>
    <!-- Header Ends Here -->