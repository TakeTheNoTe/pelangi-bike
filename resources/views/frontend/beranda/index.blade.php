@extends('frontend.layouts.app')
@section('content')
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <!-- single-slide -->
                    @foreach ($produk_slider as $item)
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-7 col-md-6">
                            <div class="banner-content">
                                <p>{!! $item->description !!}</p>
                                <div class="add-bag d-flex align-items-center">
                                    <a class="add-btn" href="{{ route('products') }}"><span
                                            class="lnr lnr-arrow-right-circle"></span></a>
                                    <span class="add-text text-uppercase">View More</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="banner-img">
                                <img class="img-fluid" src="{{ Storage::url('slider/'.$item->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
{{--
<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ url('frontend-assets/img/features/f-icon1.png') }}" alt="">
                    </div>
                    <h6>Free Delivery</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ url('frontend-assets/img/features/f-icon2.png') }}" alt="">
                    </div>
                    <h6>Return Policy</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ url('frontend-assets/img/features/f-icon3.png') }}" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ url('frontend-assets/img/features/f-icon4.png') }}" alt="">
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area --> --}}

{{--
<!-- Start category Area -->
<section class="category-area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ url('frontend-assets/img/category/c1.jpg') }}" alt="">
                            <a href="{{ route('product-category.id','sepeda-listrik') }}">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sepeda Listrik</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ url('frontend-assets/img/category/c2.jpg') }}" alt="">
                            <a href="{{ route('product-category.id','sepeda-lipat') }}">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sepeda Lipat</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ url('frontend-assets/img/category/c3.jpg') }}" alt="">
                            <a href="{{ route('product-category.id','sepeda-anak') }}">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sepeda Anak</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ url('frontend-assets/img/category/c4.jpg') }}" alt="">
                            <a href="{{ route('product-category.id','sepeda-bmx') }}">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sepeda BMX</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-deal">
                    <div class="overlay"></div>
                    <img class="img-fluid w-100" src="{{ url('frontend-assets/img/category/c5.jpg') }}" alt="">
                    <a href="{{ route('product-category.id','sepeda-gunung') }}">
                        <div class="deal-details">
                            <h6 class="deal-title">Sepeda Gunung</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area --> --}}
<section class="category-area" style="padding-top: 80px"></section>
<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Best Seller</h1>
                        <p>Kami menyediakan produk sepeda dengan berbagai variansi dan terpercaya. Produk yang kami
                            sediakan merupakan produk sepeda dengan kualitas yang baik.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($produk_all->take(8) as $item)
                <!-- single product -->
                @if ($item->status == 'best seller')
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ Storage::url('produk/'.$item->image) }}" alt="">
                        <div class="product-details">
                            <h6>{{ $item->name }}</h6>
                            <div class="price">
                                <h6>{{ $item->price }}</h6>
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
                                <a href="https://api.whatsapp.com/send?phone={{ ($item && substr($item->phone,0,2) == '08') ? '62'.substr($item->phone,1) : $item->phone}}&text=Hallo%2C%20Saya%20ingin%20memesan%20sepeda%20merk%20*{{ $item->name }}*%20Pelangi%20Bike.%20Apakah%20barang%20tersedia%3F"
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
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Produk Lainnya</h1>
                        <p>Kami menyediakan produk sepeda dengan berbagai variansi dan terpercaya. Produk yang kami
                            sediakan merupakan produk sepeda dengan kualitas yang baik.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($produk_all->take(8) as $item)
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ Storage::url('produk/'.$item->image) }}" alt="">
                        <div class="product-details">
                            <h6>{{ $item->name }}</h6>
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
                                <a href="https://api.whatsapp.com/send?phone={{ ($item && substr($item->phone,0,2) == '08') ? '62'.substr($item->phone,1) : $item->phone}}&text=Hallo%2C%20Saya%20ingin%20memesan%20sepeda%20merk%20*{{ $item->name }}*%20Pelangi%20Bike.%20Apakah%20barang%20tersedia%3F"
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
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->

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
                    @foreach ($produk_all->take(12) as $item)
                    @if ($item->status == 'promo')
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