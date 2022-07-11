@foreach ($prdk as $i)
    <div class="modal fade" id="produkmodal{{ $i->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Diskon</h5>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('produk.update', $i->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Harga Normal :</label>
                            <input type="text" class="form-control" id="pricedisc" name="price"
                                data-type="currency" value="{{ $i->price }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Harga Diskon :</label>
                            <input type="text" class="form-control" id="discount" name="discount"
                                data-type="currency">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
