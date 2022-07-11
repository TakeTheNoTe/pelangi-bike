@extends('frontend.layouts.app')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Contact Us</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('beranda') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="javascript:void(0)">Contact</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Contact Area =================-->
<section class="contact_area section_gap_bottom">
    <div class="container">
        <div class="mapBox">
            <iframe allowfullscreen width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0"
                marginwidth="0"
                src="https://maps.google.com/maps?q=-5.356389713243936,105.28779038561646&z=15&output=embed">
            </iframe>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h6 style="font-size: 18px; font-weight: 600; margin-bottom: 10px">Tentang Kami</h6>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla maiores amet enim natus sint, nobis
                    ipsa dicta vitae incidunt facere quis necessitatibus quas consequuntur dolores officia fugit
                    exercitationem molestiae? Quo modi, laborum iure nisi sunt quisquam dicta sequi hic cumque, quod
                    velit incidunt dignissimos veritatis architecto dolorum aliquid possimus minus ipsam laudantium
                    tempore dolore odio accusamus magnam voluptatibus? Molestias, vero.</p>
            </div>
            <div class="col-lg-6">
                <h6 style="font-size: 18px; font-weight: 600; margin-bottom: 10px">Lokasi Kami</h6>
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6 style="margin-bottom: 15px">Jl. Ratu Dibalau, Way Kandis, Kec. Tj. Senang, Kota Bandar
                            Lampung, Lampung 35143.</h6>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="https://api.whatsapp.com/send?phone=628129604786&text=Hallo%2C%20Saya%20ingin%20memesan%20sepeda%20di%20Pelangi%20Bike.%20Untuk%20pemesanannya%20bagaimana%20ya%3F"
                                target="_blank">08129604786</a></h6>
                        <p>Buka Setiap Hari.</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-bicycle"></i>
                        <h6><a href="https://www.instagram.com/pelangibike_lampung/" target="_blank">{{
                                '@pelangibike_lampung' }}</a></h6>
                        <p>Instagram.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->
@endsection