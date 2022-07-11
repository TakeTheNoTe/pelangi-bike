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
        @include('backend.master.produk.content.modal')
        <div class="table-responsive">
            <a href="{{ route('produk.create') }}" class="btn btn-primary mb-4">Tambah</a>
            <table class=" table display cell-border" id="dataTable" width="100%" cellspacing="0" data-page-length="10">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Harga Diskon</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Diskon</th>
                        <th class="text-center">Ubah</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($prdk as $i)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $i->name }}</td>
                            <td class="text-center">{{ $i->price }}</td>
                            <td class="text-center">{{ $i->discount }}</td>
                            <td class="text-center"><embed src="{{ asset('storage/produk/' . $i->image . '') }}"
                                    style="max-width:100px; max-height: 50px" /></td>
                            <td class="text-center">{{ $i->category_name }}</td>
                            <td class="text-center">{{ $i->status }}</td>
                            @if ($i->status == 'promo')
                                <td class="text-center"><button type="button" data-toggle="modal"
                                        data-target="#produkmodal{{ $i->id }}"
                                        class="btn btn-success btn-sm mr-2">Diskon</button>
                                </td>
                            @else
                                <td class="text-center"><button type="button" class="btn btn-danger btn-sm mr-2" disabled>
                                        Diskon</button></td>
                            @endif
                            <td class="text-center">
                                <form action="{{ route('produk.edit', $i->slug) }}" method="get">
                                    @csrf
                                    <button class="btn btn-success btn-sm">ubah</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('produk.destroy', $i->id) }}" method="post">
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
