<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\slider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
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

        $sld = DB::table('sliders')->get();

        return view('backend.master.slider.content.slider', compact('data', 'sld'));
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

        return view('backend.master.slider.function.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sld = new slider();
        $sld->description = $request->description;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->extension();
            $filePath = storage_path() . '/app/public/slider';
            $file->move($filePath, $filename);
            $sld->image = $filename;
        }
        $sld->slug = Str::slug($request->image, '-');
        $sld->save();
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

        $sld = slider::where('slug', $slug)->first();

        return view('backend.master.slider.function.edit', compact('data', 'sld'));
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
        $sld = slider::find($id);
        $sld->description = $request->description;
        $dest = storage_path('app/public/slider/' . $sld->image);
        if (!is_null($request->file('image'))) {
            if (File::exists($dest)) {
                File::delete($dest);
            }

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->extension();
                $filePath = storage_path() . '/app/public/slider';
                $file->move($filePath, $filename);
                $sld->image = $filename;
                $sld->slug = Str::slug($request->image, '-');
            }
        }
        $sld->update();

        return redirect()->route('slider.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prd = DB::table('sliders')->where('id', $id)->first();
        $dest = storage_path('app/public/slider/' . $prd->image);

        if (File::exists($dest)) {
            File::delete($dest);
        }
        DB::table('sliders')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
