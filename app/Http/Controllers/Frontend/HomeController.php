<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\slider;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $produk_slider = slider::latest()->take(5)->get();
        $produk_all = product::take(16)->latest()->get();

        return view('frontend.beranda.index', compact('data', 'produk_all', 'produk_slider'));
    }
}
