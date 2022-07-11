<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProdukController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $products = product::latest()->paginate(12)->withQueryString();

        $produk_promo = product::take(16)->latest()->get();

        return view('frontend.produk.index', compact('data', 'products', 'produk_promo'));
    }

    public function searchProducts(Request $request)
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        //sort keyword in form input
        $products    = product::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('name', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate(12);
        //menimpa request keyword
        $products->appends($request->only('keyword'));

        $produk_promo = product::take(16)->latest()->get();

        return view('frontend.produk.pencarianProduk', compact('data', 'products', 'produk_promo'));
    }

    public function productDetails($slug)
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $produk_detail = product::where('slug', $slug)->first();
        $produk_promo = product::take(16)->latest()->get();

        return view('frontend.produk.produkDetail', compact('data', 'produk_detail', 'produk_promo'));
    }
}
