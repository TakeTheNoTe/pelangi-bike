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
        <h2 class="text-dark font-weight-bold mb-2">Slider</h2>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
        </div>
    </div>
@stop
@section('main-content')
    <div class="card-body">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah Slider</h4>
                    <form class="forms-sample" method="POST" action="{{ route('slider.update', $sld->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="image">Gambar :</label><br>
                            <img id="prvwimg" src="{{ asset('storage/slider/' . $sld->image) }}" alt="your image"
                                class="mb-4" style="max-width:300px;" />
                            <div class="input-group col-xs-12">
                                <input type="file" accept="image/*" class="form-control" style="display:none;"
                                    id="image" name="image" placeholder="image" value={{ $sld->image }}required>
                                <span class="input-group-append">
                                    <button class="btn btn-primary" id="upfile" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi :</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{!! $sld->description !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <a href="{{ route('slider.index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
