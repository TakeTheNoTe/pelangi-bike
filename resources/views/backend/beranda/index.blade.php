@extends('backend.layouts.backend.dashboard')

@section('main-content')
<div class="d-xl-flex justify-content-between align-items-start">
    <h2 class="text-dark font-weight-bold mb-2"> Dashboard </h2>
    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
            <ul class="nav nav-tabs tab-transparent" role="tablist">

            </ul>
            <div class="d-md-block d-none">
                <a href="{{ route('dashboard') }}" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
            </div>
        </div>
        <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="mb-2 text-dark font-weight-normal">Jumlah Produk</h5>
                                <div
                                    class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                                </div>
                                <h2 class="mb-0 font-weight-bold mt-2 text-dark">{{ $products->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="mb-2 text-dark font-weight-normal">Kategori Produk</h5>
                                <div
                                    class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                                </div>
                                <h2 class="mb-0 font-weight-bold mt-2 text-dark">{{ $category->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="mb-2 text-dark font-weight-normal">Blogs</h5>
                                <div
                                    class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent">
                                </div>
                                <h2 class="mb-0 font-weight-bold mt-2 text-dark">{{ $blogs->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection