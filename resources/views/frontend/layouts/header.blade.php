<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('beranda') }}"><img
                        src="{{ url('frontend-assets/img/logo3.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('beranda') }}">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false">Sepeda</a>
                            <ul class="dropdown-menu">
                                @php
                                $a = App\Models\category::Select('*')->get();
                                $c = App\Models\product::Select('*')->get();
                                @endphp

                                @foreach ($a as $b)
                                @if ($c->where('category_id', $b->id)->count() > 0)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('product-category.id', $b->slug) }}">{{ $b->name
                                        }}</a>
                                </li>
                                @endif
                                @endforeach

                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('blogs') }}">Blogs</a></li>
                        <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('contacts') }}">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form action="{{ route('search-products') }}" method="get" class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" name="keyword" placeholder="Search ..."
                    value="{{ request('keyword') }}">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>