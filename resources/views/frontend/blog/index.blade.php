@extends('layouts.frontend')
@section('title', 'Blog Pages')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>blog</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space blog-page ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">
                @foreach ($blogs as $blog)
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="{{ route('blogs-view',$blog->slug) }}"><img
                                    src="{{ asset('uploads/blog/'.$blog->image) }}"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>{{ $blog->created_at->diffForHumans() }}</h6> <a
                                    href="{{ route('blogs-view',$blog->slug) }}">
                                    <h4>{{ $blog->title }}</h4>
                                </a>
                                <ul class="post-social">
                                    <li>Posted By : {{ $blog->user->user_name ?? 'N/A' }}</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>{{ $blog->short_des }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="product-pagination">
                    <div class="theme-paggination-block">
                        <div class="row">
                            {{ $blogs->links('vendor.pagination.custom') }}
                            {{-- <div class="col-xl-6 col-md-6 col-sm-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span
                                                    aria-hidden="true"><i class="fa fa-chevron-left"
                                                        aria-hidden="true"></i></span> <span
                                                    class="sr-only">Previous</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                    aria-hidden="true"><i class="fa fa-chevron-right"
                                                        aria-hidden="true"></i></span> <span
                                                    class="sr-only">Next</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="product-search-count-bottom">
                                    <h5>Showing Products 1-24 of 10 Result</h5>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="blog-sidebar">
                    <div class="theme-card">
                        <h4>Popular Blog</h4>
                        <ul class="recent-blog">
                            @foreach ($popular_post as $post)
                            <li><a href="{{ route('blogs-view',$blog->slug) }}">
                                    <div class="media"> <img class="img-fluid blur-up lazyload"
                                            src="{{ asset('uploads/blog/'.$blog->image) }}"
                                            alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>{{ $blog->created_at->diffForHumans() }}</h6>
                                            <p>{{ $blog->viewer }} Viewer</p>
                                        </div>
                                    </div>
                                    <h6>{{ $blog->title }}</h6>
                                </a>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                    {{-- <div class="theme-card">
                        <h4>Popular Blog</h4>
                        <ul class="popular-blog">
                            @foreach ($popular_post as $post)
                            <li>
                                <div class="media">
                                    <div class="blog-date"><img class="img-fluid blur-up lazyload"
                                            src="{{ asset('uploads/blog/'.$blog->image) }}"
                                            alt="Generic placeholder image"></div>
                                    <div class="media-body align-self-center">
                                        <h6>{{ $blog->title }}</h6>
                                        <p>{{ $blog->viewer }} Viewer</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endsection