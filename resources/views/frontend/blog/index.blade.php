@extends('frontend.layouts.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Blog Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('beranda') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="javascript:void(0)">Blog</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->


<!--================Blog Area =================-->
<section class="blog_area" style="padding-top: 90px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('search-blogs') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts..." name="keyword"
                                    placeholder="Search ..." value="{{ request('keyword') }}"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </aside>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog_left_sidebar" style="padding-top: 50px; padding-bottom: 50px;">
                    <article class="row blog_item">
                        @if ($blogs->count() > 0)
                        @foreach ($blogs as $item)
                        <div class="col-md-4">
                            <div class="blog_post">
                                <img style="height: 230px; width: 100%" src="{{ Storage::url('blog/'.$item->image) }}"
                                    alt="blog-name">
                                <div class="blog_details">
                                    <a href="{{ route('blog-details.blogId',$item->slug) }}">
                                        <h2>{{Str::limit($item->title,55,'...')}}</h2>
                                    </a>
                                    <p>{!! Str::limit($item->content,120,'...') !!}</p>
                                    <a href="{{ route('blog-details.blogId',$item->slug) }}"
                                        class="white_bg_btn">Selengkapnya...</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-12">
                            <div>
                                <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_ghfpce1h.json"
                                    background="transparent" speed="1" style="width: 100%; height: 300px;" loop
                                    autoplay></lottie-player>
                            </div>
                        </div>
                        @endif
                    </article>

                    @if ($blogs->count() > 0)
                    {{$blogs->links()}}
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection

@section('script')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection