<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Pages::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required",
            'image'=>"required|mimes:jpg,png,jpeg,gif,svg|max:2028",
            'content'=>"required",
            'slug'=>"required",
            'order'=>"required",
        ]);
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
        Pages::create([
            'title'=>$request['title'],
            'image'=>$file_name,
            'content'=>$request['content'],
            'slug'=>$request['slug'],
            'order'=>$request['order'],
        ]);
        return redirect()->route('admin.pages.index')->with('flash_message', 'Kayıt Başarıyla Eklenmiştir!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pages = Pages::find($id);
        return view('admin.pages.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pages = Pages::find($id);
        if ($pages->title == $request->input('title') && $pages->content == $request->input('content')) {
            return back()->with('error', 'Hiçbir değişiklik yapılmadı, kaydetmek için en az bir değişiklik yapmalısınız.');
        }
        $request->validate([
            'title'=>"required",
            /*'image'=>"required|mimes:jpg,png,jpeg,gif,svg|max:2028",*/
            'content'=>"required",
            'slug'=>"required",
            'order'=>"required",
        ]);
        $params = [
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ];

        if ($request->hasFile('image')) {
            // Mevcut resmi diskten sil
            $oldImagePath = public_path('images/' . $pages->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Yeni resimi yükle
            $file_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $file_name);

            // Yeni resmin dosya adını güncelle
            $params['image'] = $file_name;
        }
        $pages->update($params);
        return redirect()->route('admin.pages.index')->with('flash_message', 'Kayıt Başarıyla Düzenlenmiştir');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pages = Pages::find($id);
        $pages->delete();
        return redirect()->route('admin.pages.index')->with('flash_message', 'Kayıt Başarıyla Silinmiştir');
    }
}
