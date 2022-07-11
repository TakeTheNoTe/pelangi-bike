<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\blog;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
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

        $blg = DB::table('blogs')->get();

        return view('backend.blog.content.blog', compact('data', 'blg'));
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

        // $sts = DB::table('statuses')->orderBy('id', 'desc')->get();

        return view('backend.blog.function.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blg = new blog();
        $blg->title = $request->title;
        $blg->content = $request->content;
        $blg->slug = Str::slug($request->title, '-');
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->extension();
            $filePath = storage_path() . '/app/public/blog';
            $file->move($filePath, $filename);
            $blg->image = $filename;
        }
        $blg->save();
        return redirect()->route('blog.create')->with('success', 'Data berhasil ditambahkan');
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

        $blg = DB::table('blogs')->where('slug', $slug)->first();

        return view('backend.blog.function.edit', compact('data', 'blg'));
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
        $blg = blog::find($id);
        $blg->title = $request->title;
        $blg->content = $request->content;
        $blg->slug = Str::slug($request->title, '-');
        $dest = storage_path('app/public/blog/' . $blg->image);
        if (!is_null($request->file('image'))) {
            if (File::exists($dest)) {
                File::delete($dest);
            }

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->extension();
                $filePath = storage_path() . '/app/public/blog';
                $file->move($filePath, $filename);
                $blg->image = $filename;
            }
        }
        $blg->update();

        return redirect()->route('blog.index', $blg->slug)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prd = blog::where('id', $id)->first();
        $dest = storage_path('app/public/blog/' . $prd->image);

        if (File::exists($dest)) {
            File::delete($dest);
        }
        blog::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
