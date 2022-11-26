@extends('frontend.layouts.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Product Details Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('beranda') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="javascript:void(0)">Product details</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="">
                    <div class="single-prd-item">
                        <img style="width: 100%" class="img-fluid"
                            src="{{ Storage::url('produk/'.$produk_detail->image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $produk_detail->name }}</h3>
                    @if ($produk_detail->status =='promo' && $produk_detail->discount !='Rp 0')
                    <h2 style="padding-top: 15px;">{{ $produk_detail->discount }}</h2>
                    <h6 class="l-through" style="text-decoration: line-through; padding-bottom: 22px; color: #cccccc">
                        {{
                        $produk_detail->price }}</h6>
                    @else
                    <h2 style="padding-top: 15px; padding-bottom: 15px;">{{ $produk_detail->price }}</h2>
                    @endif
                    <ul class="list">
                        <li><a class="active"
                                href="{{ route('product-category.id',$produk_detail->productCategory->slug) }}"><span>Kategori</span>
                                : {{ $produk_detail->productCategory->name
                                }}</a>
                        </li>
                        @if ($produk_detail->status != 'nett')
                        <li><a href="javascript:void(0)"><span>Status</span> : <span class="text-uppercase">{{
                                    $produk_detail->status
                                    }}</span></a>
                        </li>
                        @else
                        <li><a href="javascript:void(0)"><span>Status</span> : <span class="text-uppercase">{{
                                    "Nett"
                                    }}</span></a>
                        </li>
                        @endif
                    </ul>
                    <p>{!! Str::limit($produk_detail->description,
                        160) !!}</p>
                    <div class="card_area d-flex align-items-center">
                        <a class="primary-btn" target="_blank"
                            href="https://api.whatsapp.com/send?phone={{ ($produk_detail && substr($produk_detail->phone,0,2) == '08') ? '62'.substr($produk_detail->phone,1) : $produk_detail->phone}}&text=Hallo%2C%20Saya%20ingin%20memesan%20sepeda%20merk%20*{{ $produk_detail->name }}*%20di%20Pelangi%20Bike.%20Apakah%20barang%20tersedia%3F">Buy
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="false">Description</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade  show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>{!! $produk_detail->description !!}</p>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Promo Minggu Ini</h1>
                    <p>Kami menyediakan harga promo setiap minggu pada produk sepeda kami. produk kami memiliki kualias
                        yang baik.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($produk_promo->take(12) as $item)
                    @if ($item->status =='promo')
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="{{ route('detail-produk.produkId',$item->slug) }}"><img
                                    style="width: 100px; border-radius: 8px;"
                                    src="{{ Storage::url('produk/'.$item->image) }}" alt=""></a>
                            <div class="desc">
                                <a href="{{ route('detail-produk.produkId',$item->slug) }}" class="title">{{ $item->name
                                    }}</a>
                                <div class="price">
                                    @if ($item->status =='promo' && $item->discount !='Rp 0')
                                    <h6>{{ $item->discount }}</h6>
                                    <h6 class="l-through" style="text-decoration: line-through;">{{ $item->price }}</h6>
                                    @else
                                    <h6>{{ $item->price }}</h6>
                                    @endif
                                    @if ($item->status !='nett')
                                    <h6 class="l-through"
                                        style="color: #f44a40; position: absolute; top: 6px; left: 8px; margin: auto;">
                                        <span class="genric-btn danger circle"
                                            style="line-height: 18px; padding: 0px 15px; font-size: 9px; background: #f44a40; color: #fff; text-transform: uppercase">{{
                                            $item->status }}</span>
                                    </h6>
                                    @endif
                                    <h6 class="l-through">
                                        <i class="fa fa-tags" style="color: #f44a40;"></i>&nbsp;<a
                                            href="{{ route('product-category.id',$item->productCategory->slug) }}"
                                            style="color: #f44a40; font-size: 10px">{{$item->productCategory->name
                                            }}</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End related-product Area -->

@endsection
