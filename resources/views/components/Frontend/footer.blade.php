@php
   $siteData= App\Models\BlogFrontEnd::all()->first();
@endphp
    <!-- Footer Starts Here -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-lg-between">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <a href="{{route("home.index")}}">
                            <a href="">
                                <img src="{{asset($siteData->site_logo)}}" alt=""  width="120" height="40"  >
                        </a>
                        <p>
                            {{$siteData->site_description}}
                            
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="footer-wizard">
                        <h6>Category</h6>
                        <ul class="list-unstyled">
                        @php
                            $cat=App\Models\BlogCategory::all() ;
                            $folow= App\Models\FollowUs::all() ;
                        @endphp 
                         @foreach ($cat as $item)
                         <li><a href="{{url('post/category/'.$item->category_slug)}}" class="main-menu-item">{{$item->category_name}}</a></li>
                         @endforeach
                    
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3">
                    <div class="footer-wizard">
                        <h6>Follow us</h6>
                        <ul class="list-unstyled">
                            @foreach ($folow as $item)
                            <li><a href="{{$item->follow_slug}}">{{$item->follow_name}}</a></li>
                            @endforeach
                            
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-wizard">
                        <h6>Newsletter</h6>
                        <form action="{{route('mail.send')}}" method="POST">
                            <div class="footer-wizard-form">
                                @csrf
                                <input type="email" placeholder="Enter Email" name="email" >
                            
                                <button type="sub
                                " class="btn btn-default btn-default-sm">Subscribe</button>
                               
                            </div>
                            @if ($errors->has('email'))
                            <p class=" text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <p>@ @php
                    echo date("Y");
                    @endphp - Blogy</p>
                <p>Designed & Develop by <a href="https://zakirsoft.com/">Zakirsoft</a></p>
            </div>
        </div>
    </footer>
    <!-- Footer Ends Here -->
    <!-- jQuery JS Link -->
    <script src="{{asset('Fontend')}}/dist/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS Link -->
    <script src="{{asset('Fontend')}}/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Menu JS Link -->
    <script src="{{asset('Fontend')}}/dist/js/menu.js"></script>

    <!-- Slick JS Link -->
    <script src="{{asset('Fontend')}}/dist/js/slick.min.js"></script>

    <!-- Custom JS Link -->
    <script src="{{asset('Fontend')}}/dist/js/main.js"></script>
    
</body>

</html>