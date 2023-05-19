
@include('components.Frontend.header')
<section class="section-padding latest-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading text-center">Your Tag Post</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($post as $p)
             @foreach ($post_id as $pid)   
               @if ($p->id==$pid->post_id)
                    <div class="col-lg-4 my-4 my-md-0 my-lg-0 col-md-6">
                        <div class="blog-item blog-item-sm">
                            <div class="blog-item-image">
                                <a href="{{url('/admin/blogpost/preview/'.$p->post_slug)}}">
                                    <img src="{{asset($p->header_img)}}" alt="Image">
                                </a>
                            </div>
                            <div class="blog-item-info">
                                <span class="fs-6 has-line">{{$p->category->category_name}}</span>
                                <h5><a href="{{url('/admin/blogpost/preview/'.$p->post_slug)}}">{{$p->header_title}}</a></h5>
                                <div class="blog-item-info-release">
                                    <span>March 25, 2021</span> <span class="dot"></span> <span>4 min read</span>
                                </div>
                                <a href="{{url('/admin/blogpost/preview/'.$p->post_slug)}}" class="btn btn-link">Read Article
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>       
            @endif
            @endforeach
            @endforeach
        
        </div>
    </div>
</section>
@include('components.Frontend.footer')