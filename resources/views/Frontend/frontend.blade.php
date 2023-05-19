@include('components.Frontend.header')

    <!-- Banner Starts Here -->
    <section class="banner"
        style="background-color: #F5F5F5; background-image: url({{asset($siteData->site_slider)}});background-position: right; background-repeat: no-repeat;" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-slider">
                        @foreach ($lates as $item)
                        <div class="banner-content">
                            <div class="banner-content-main">
                                <span class="fs-6 has-line">{{$item->category->category_name}}</span>
                                <h4><a href="{{url('/admin/blogpost/preview/'.$item->post_slug)}}">{{$item->header_title}}</a></h4>
                                <div class="blog-date">
                                    <div class="blog-date-start">
                                        <span>{{$item->updated_at->format('M d, Y')}}</span>
                                    </div>
                                    <div class="blog-date-end">
                                        <span>{{$item->read_time}} read</span>
                                    </div>
                                </div>
                                <p>
                                    {{$item->blog_article}}
                                </p>
                                <a href="{{url('/admin/blogpost/preview/'.$item->post_slug)}}" class="btn btn-default">Read More</a>
                            </div>
                        </div>
                        @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Ends Here -->

    <!-- Post Feture Starts Here -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Recent Post</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($lates  as $lates)
                <div class="col-lg-4">
                    <div class="post-feature">
                        <span class="fs-6 has-line">{{$lates->category->category_name}}</span>
                        <h6><a href="{{url('/admin/blogpost/preview/'.$lates->post_slug)}}">{{$lates->blog_title}}</a></h6>
                        <div class="blog-item-info-release">
                            <span>{{$lates->updated_at->format('M d, Y')}}</span> <span class="dot"></span> <span>{{$lates->read_time}} read</span>
                        </div>
                        <a href="{{url('/admin/blogpost/preview/'.$lates->post_slug)}}" class="btn btn-link">Read Article
                            <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Post Feture Ends Here -->

    <!-- Latest Post Starts Here -->
    <section class="section-padding latest-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Latest Post</h4>
                </div>
            </div>
            <div class="row">
            @foreach ($latest  as $post_item)
                <div class="col-lg-4 my-4 my-md-0 my-lg-0 col-md-6">

                    <div class="blog-item blog-item-sm">
                        <div class="blog-item-image">
                            <a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}">
                                <img src="{{asset($post_item->header_img)}}" alt="Image">
                            </a>
                        </div>
                        <div class="blog-item-info">
                            <span class="fs-6 has-line">{{$post_item->category->category_name}}</span>
                            <h5><a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}">{{$post_item->blog_title}}</a></h5>
                            <div class="blog-item-info-release">
                                <span>{{$lates->updated_at->format('M d, Y')}}</span> <span class="dot"></span> <span>{{$lates->read_time}} read</span>
                            </div>
                            <a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}" class="btn btn-link">Read Article
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Post Ends Here -->

    <!-- Featured Post Starts Here -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Featured Post</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($alldata as $post_item)
                @if ($post_item->featured==1)
                    
                
                <div class="col-lg-6 col-md-6">
                    <div class="blog-item">
                        <div class="blog-item-image">
                            <a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}">
                                <img src="{{asset($post_item->header_img)}}" alt="Image">
                            </a>
                        </div>
                        <div class="blog-item-info">
                            <span class="fs-6 has-line">{{$post_item->category->category_name}}</span>
                            <h5><a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}">{{$post_item->blog_title}}</a></h5>
                            <div class="blog-item-info-release">
                                <span>{{$lates->updated_at->format('M d, Y')}}</span> <span class="dot"></span> <span>{{$lates->read_time}} read</span>
                            </div>
                            <a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}" class="btn btn-link">Read Article
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Post Ends Here -->

    <!-- All Post Starts Here -->
    <section class="section-padding all-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">All Post</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($alldata as $post_item)
                        <div class="col-lg-6 col-md-6 mt-4 mt-md-0 mt-lg-0 mt-5">
                            <div class="blog-item blog-item-sm">
                                <div class="blog-item-image">
                                    <a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}">
                                        <img src="{{asset($post_item->header_img)}}" alt="Image">
                                    </a>
                                </div>
                                <div class="blog-item-info">
                                    <span class="fs-6 has-line">{{$post_item->category->category_id}}</span>
                                    <h5><a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}">{{$post_item->blog_title}}</a></h5>
                                    <div class="blog-item-info-release">
                                        <span>{{$lates->updated_at->format('M d, Y')}}</span> <span class="dot"></span> <span>{{$lates->read_time}} read</span>
                                    </div>
                                    <a href="{{url('/admin/blogpost/preview/'.$post_item->post_slug)}}" class="btn btn-link">Read Article
                                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                        
                        
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="featured-category">
                        <h6>Featured Category</h6>
                       
                       
                        @foreach ($cat as $item)
                        <div class="featured-category-item mb-0"
                            style="background-image: url({{asset($item->category_img)}});">
                            <a href="{{url('post/category/'.$item->category_slug)}}">{{$item->category_name}}</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="all-tags">
                        <h6>All Tags</h6>
                        <ul class="list-unstyled list-inline all-tags-list">
                            @foreach ($tag as $item)
                            <li class="list-inline-item m-1"><a href="{{url('post/tag/'.$item->tag_name)}}">{{$item->tag_name}}</a></li>
                            @endforeach
                            
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- All Post Ends Here -->
    @include('components.Frontend.footer')
