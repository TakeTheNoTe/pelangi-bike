@extends('frontend.layouts.app')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Products Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('beranda') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="javascript:void(0)">Products</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list" style="padding-top: 90px">
                <div class="row">
                    @if ($products->count() > 0)
                    @foreach ($products as $item)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ Storage::url('produk/'.$item->image) }}" alt="">
                            <div class="product-details">
                                <h6>{{$item->name}}</h6>
                                <div class="price">
                                    @if ($item->status =='promo' && $item->discount !='Rp 0')
                                    <h6>{{ $item->discount }}</h6>
                                    <h6 class="l-through" style="text-decoration: line-through;">{{ $item->price }}</h6>
                                    @else
                                    <h6>{{ $item->price }}</h6>
                                    @endif
                                    @if ($item->status !='nett')
                                    <h6 class="l-through"
                                        style="color: #f44a40; position: absolute;  top: 8px; left: 5px; margin: auto;">
                                        <span class="genric-btn danger circle"
                                            style="line-height: 28px; padding: 0px 15px; background: #f44a40;color: #fff">{{
                                            $item->status }}</span>
                                    </h6>
                                    @endif
                                    <h6 class="l-through">
                                        <i class="fa fa-tags" style="color: #f44a40;"></i>&nbsp;<a
                                            href="{{ route('product-category.id',$item->productCategory->slug) }}"
                                            style="color: #f44a40; font-size: 12px">{{$item->productCategory->name
                                            }}</a>
                                    </h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="https://api.whatsapp.com/send?phone={{ ($item && substr($item->phone,0,2) == '08') ? '62'.substr($item->phone,1) : $item->phone}}&text=Hallo%2C%20Saya%20ingin%20memesan%20sepeda%20merk%20*{{ $item->name }}*%20di%20Pelangi%20Bike.%20Apakah%20barang%20tersedia%3F"
                                        class="social-info" target="_blank">
                                        <span class="ti-comment-alt"></span>
                                        <p class="hover-text">Buy Now</p>
                                    </a>
                                    <a href="{{ route('detail-produk.produkId',$item->slug) }}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <div style="padding-top: 10px; padding-bottom: 90px">
                            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_ghfpce1h.json"
                                background="transparent" speed="1" style="width: 100%; height: 300px;" loop autoplay>
                            </lottie-player>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start pagination Bar -->
            @if ($products->count() > 0)
            {{$products->links()}}
            @endif
            <!-- End pagination Bar -->
        </div>
    </div>
</div>

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

@section('script')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection