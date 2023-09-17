<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> "required",
            'slug'=>"required"
        ]);
        Category::create([
           'name'=> $request->name,
           'slug'=> $request->slug
        ]);
        return redirect()->route('admin.category.index')->with('flash_message', 'Kayıt Başarıyla Eklenmiştir!!');
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
        $category = Category::find($id);
        return view('admin.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>"required",
            'slug'=>"required"
        ]);
        $category = Category::find($id);

        if ($category->name == $request->input('name') && $category->slug == $request->input('slug')) {
            return back()->with('error', 'Hiçbir değişiklik yapılmadı, kaydetmek için en az bir değişiklik yapmalısınız.');
        }
        $category->update([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);
        return redirect()->route('admin.category.index')->with('flash_message', 'Kayıt Başarıyla Düzenlenmiştir!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('flash_message', 'Kayıt Başarıyla Silinmiştir!!');
    }
}
