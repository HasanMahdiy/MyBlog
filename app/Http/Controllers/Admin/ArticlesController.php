<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::with([
            'category'
        ])->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $icerik = $request->input('icerik');
        $request->validate([
           'category_id'=>"required",
            'title'=>"required",
            'image'=>"required|mimes:jpg,png,jpeg,gif,svg|max:2028",
            'content'=>"required",
            'slug' => "required"
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
        Articles::create([
            'category_id'=> $request['category_id'],
            'title' => $request['title'],
            'image'=> $file_name,
            'content'=> $request['content'],
            'slug' => $request['slug']
        ]);
        return redirect()->route('admin.articles.index', compact('icerik'))->with('flash_message', 'Kayıt Başarıyla Eklenmiştir!!');
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
        $categories = Category::all();
        $articles = Articles::find($id);
        return view('admin.articles.edit', compact('categories','articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required'
        ]);

        $articles = Articles::find($id);

        if ($articles->title == $request->input('title') && $articles->content == $request->input('content')) {
            return back()->with('error', 'Hiçbir değişiklik yapılmadı, kaydetmek için en az bir değişiklik yapmalısınız.');
        }



        $params = [
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => $request->input('slug')
        ];

        if ($request->hasFile('image')) {
            // Mevcut resmi diskten sil
            $oldImagePath = public_path('images/' . $articles->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Yeni resimi yükle
            $file_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $file_name);

            // Yeni resmin dosya adını güncelle
            $params['image'] = $file_name;
        }

        $articles->update($params);
        return redirect()->route('admin.articles.index')->with('flash_message', 'Kayıt Başarıyla Düzenlenmiştir');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Articles::find($id);
        $item->delete();
        return redirect()->route('admin.articles.index')->with('flash_message', 'Kayıt Başarıyla Silinmiştir!!');
    }
}
