<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $prdk = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->get();


        return view('backend.master.produk.content.produk', compact('data', 'prdk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $ktg = DB::table('categories')->orderBy('id', 'desc')->get();

        return view('backend.master.produk.function.create', compact('data', 'ktg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prd = new product();
        $prd->name = $request->name;
        $prd->price = $request->price;
        $prd->phone = $request->phone;
        $prd->description = $request->description;
        $prd->category_id = $request->category;
        $prd->status = $request->status;
        $prd->slug = Str::slug($request->name, '-');
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->extension();
            $filePath = storage_path() . '/app/public/produk';
            $file->move($filePath, $filename);
            $prd->image = $filename;
        }
        $prd->save();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();

        $ktg = DB::table('categories')->orderBy('id', 'desc')->get();
        $prdk = product::where('slug', $slug)->first();

        return view('backend.master.produk.function.edit', compact('data', 'ktg', 'prdk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prd = product::find($id);
        if (is_null($request->input('discount'))) {
            $prd->name = $request->name;
            $prd->price = $request->price;
            $prd->phone = $request->phone;
            $prd->description = $request->description;
            $prd->category_id = $request->category;
            $prd->status = $request->status;
            $prd->slug = Str::slug($request->name, '-');
            $dest = storage_path('app/public/produk/' . $prd->image);
            if (!is_null($request->file('image'))) {
                if (File::exists($dest)) {
                    File::delete($dest);
                }

                if ($request->file('image')) {
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->extension();
                    $filePath = storage_path() . '/app/public/produk';
                    $file->move($filePath, $filename);
                    $prd->image = $filename;
                }
            }
        }
        if (!is_null($request->discount)) {
            $prd->discount = $request->discount;
        }

        $prd->update();

        return redirect()->route('produk.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prd = DB::table('products')->where('id', $id)->first();
        $dest = storage_path('app/public/produk/' . $prd->image);

        if (File::exists($dest)) {
            File::delete($dest);
        }
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
