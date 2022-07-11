<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class KategoriProdukController extends Controller
{
    public function productByCategory(category $key)
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $product_category = category::select(['id', 'name', 'slug'])->where('slug', $key->slug)->get();
        $product_category_all =  $key->products()->latest()->paginate(12);

        $produk_promo = product::take(16)->latest()->get();


        return view('frontend.produk.kategori.kategoriProduk', compact('data', 'product_category', 'product_category_all', 'produk_promo'));
    }
}
