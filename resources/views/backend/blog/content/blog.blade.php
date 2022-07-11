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
    <h2 class="text-dark font-weight-bold mb-2">Blog</h2>
    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
    </div>
</div>
@stop
@section('main-content')
<div class="card-body">
    <div class="table-responsive">
        <a href="{{ route('blog.create') }}" class="btn btn-primary mb-4">Tambah</a>
        <table class=" table display cell-border" id="dataTable" width="100%" cellspacing="0" data-page-length="25">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Konten</th>
                    <th class="text-center">ubah</th>
                    <th class="text-center">hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($blg as $i)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-left" style="white-space: pre-line; word-break: break-all">{{ $i->title }}</td>
                    <td class="text-center"><embed src="{{ asset('storage/blog/' . $i->image . '') }}"
                            style="max-width:100px; max-height: 50px" /></td>
                    <td class="text-left" style="white-space: pre-line; word-break: break-all">{!! $i->content !!}</td>
                    <td class="text-left">
                        <form action="{{ route('blog.edit', $i->slug) }}" method="get">
                            @csrf
                            <button class="btn btn-success btn-sm">Ubah</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('blog.destroy', $i->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop