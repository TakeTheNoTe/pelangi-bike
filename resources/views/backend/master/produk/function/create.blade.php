@extends('backend.layouts.backend.dashboard')
@section('header')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2">Produk</h2>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
        </div>
    </div>
@stop
@section('main-content')
    <div class="card-body">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Produk</h4>
                    <form class="forms-sample" method="POST" action="{{ route('produk.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama :</label>
                            <input type="text" class="form-control" id="name"
                                name="name"placeholder="Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga :</label>
                            <input type="text" class="form-control" name="price" id="price" data-type="currency"
                                placeholder="Harga Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Handphone :</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="08129604786"
                                placeholder="Nomor Handphone" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori :</label>
                            <select class="form-control" id="category" name="category" required>
                                <option class="form-control" readonly>-- Pilih Kategori --</option>
                                @foreach ($ktg as $i)
                                    <option class="form-control" value="{{ $i->id }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Status :</label>
                            <select class="form-control" id="status" name="status">
                                <option class="form-control" readonly>-- Pilih Status --</option>
                                <option class="form-control" value="nett">nett</option>
                                <option class="form-control" value="promo">promo</option>
                                <option class="form-control" value="best seller">best seller</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar :</label><br>
                            <img id="prvwimg" src="{{ asset('backend-assets/images/default-image.jpg') }}"
                                alt="your image" class="mb-4" style="max-width:300px;" />
                            <div class="input-group col-xs-12">
                                <input type="file" accept="image/*" class="form-control" style="display:none;"
                                    id="image" name="image" placeholder="image" required>
                                <span class="input-group-append">
                                    <button class="btn btn-primary" id="upfile" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi :</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <a href="{{ route('produk.index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
