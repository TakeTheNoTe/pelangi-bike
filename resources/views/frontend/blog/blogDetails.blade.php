@extends('frontend.layouts.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Blog Detail Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('beranda') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="javascript:void(0)">Blog Details</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img style="width: 100%" class="img-fluid"
                                src="{{ Storage::url('blog/'.$detailBlog->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 blog_details">
                        <h2>{{$detailBlog->title}}</h2>
                        <p class="excert">
                            {!! $detailBlog->content !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
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
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title" style="font-size: 16px">Best Seller Produk</h3>
                        @foreach ($products as $item)
                        @if ($item->status == 'best seller')
                        <div class="media post_item">
                            <img style="width: 70px;max-height: 50px" src="{{ Storage::url('produk/'.$item->image) }}"
                                alt="post">
                            <div class="media-body">
                                <a href="{{ route('detail-produk.produkId',$item->slug) }}">
                                    <h3>{{ $item->name }}</h3>
                                </a>
                                <p>{{ $item->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection