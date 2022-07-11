<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $blogs = blog::latest()->paginate(9)->withQueryString();

        return view('frontend.blog.index', compact('data', 'blogs'));
    }

    public function blogDetails($slug)
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $detailBlog = blog::where('slug', $slug)->first();
        $products = product::take(4)->latest()->get();

        return view('frontend.blog.blogDetails', compact('data', 'detailBlog', 'products'));
    }

    public function searchBlogs(Request $request)
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        //sort keyword in form input
        $blogs    = blog::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('title', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate(9);
        //menimpa request keyword
        $blogs->appends($request->only('keyword'));

        return view('frontend.blog.pencarianBlog', compact('data', 'blogs'));
    }
}
