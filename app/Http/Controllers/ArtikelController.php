<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel=Artikel::orderby('id', 'DESC')->paginate();
        return view('artikel.manage.index',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        return view('artikel.manage.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->storeAs('public',$fileName);
        $artikel=Artikel::create([
            'category_id'=>$request->category,
            'name'=>$request->name,
            'watak'=>$request->watak,
            'konten'=>$request->konten,
            'file'=>$fileName,
        ]);

        /*$artikel=new Artikel();
        $artikel->category_id=$request->category;
        $artikel->name=$request->name;
        $artikel->watak=$request->watak;
        $artikel->konten=$request->konten;
        $artikel->save();*/
        return back()->with('success','Tambah Data Sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel=Artikel::whereId($id)->first();
        return view('artikel.show',compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::get();
        $artikel=Artikel::find($id);
        return view('artikel.manage.edit',compact('categories','artikel'));
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
        $artikel=Artikel::whereId($id)->first();
        if (\File::exists('storage/'.$artikel->file)) {
            \File::delete('storage/'.$artikel->file);
        }
        $fileName = time() . '.' . $request->file->extension();
        $request->file('file')->storeAs('public', $fileName);
        $artikel->update([
            'category_id'=>$request->category,
            'name'=>$request->name,
            'watak'=>$request->watak,
            'konten'=>$request->konten,
            'file'=>$fileName,
        ]);
        return back()->with('success','Data sudah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel=Artikel::whereId($id)->first();
        if (\File::exists('storage/'.$artikel->file)) {
            \File::delete('storage/'.$artikel->file);
        }
        Artikel::whereId($id)->delete();
        return back()->with('success','Data sudah berhasil dihapus');
    }
}
