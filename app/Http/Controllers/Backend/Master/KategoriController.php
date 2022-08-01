<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
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

        $ktg = category::orderBy('id', 'desc')->get();

        return view('backend.master.kategori.content.kategori', compact('data', 'ktg'));
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

        return view('backend.master.kategori.function.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ctg = new category();
        $ctg->name = $request->name;
        $ctg->description = $request->description;
        $ctg->slug = Str::slug($request->name);
        $ctg->save();

        return redirect()->route('kategori.create')->with('success', 'Data berhasil ditambahkan');
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
        $ktg = category::where('slug', $slug)->first();
        $data['title'] = 'Pelangi Bike';
        $data['intro'] = 'Pelangi Bike';
        $data['type'] = 'Pelangi Bike';
        $data['url'] = URL::current();
        return view('backend.master.kategori.function.edit', compact('data', 'ktg'));
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
        $ctg = category::find($id);
        $ctg->name = $request->name;
        $ctg->description = $request->description;
        $ctg->slug = Str::slug($request->name);
        $ctg->update();

        return redirect()->route('kategori.index')->withSuccess('Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = category::find($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Data Kategori Berhasil Dihapus');
    }
}
