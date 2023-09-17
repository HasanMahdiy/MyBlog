<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Articles;
use App\Models\Pages;
use App\Models\Contact;


class Homepage extends Controller
{
    public function __construct()
    {
        view()->share('pages',Pages::orderBy('order','ASC')->get());
        view()->share('categories',Category::orderBy('name','ASC')->get());
    }

    public function index($category_id=null){
        $articles = Articles::orderBy('created_at','DESC')->with(['category'])->paginate(2);;
        if($category_id != null){
            $articles = Articles::orderBy('created_at','DESC')->where('category_id', $category_id)->with('category')->paginate(3);
        }
        return view('front.homepage', compact('articles', ));
    }

    public function single($slug){
        $articles = Articles::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazi bulunamadı');
        $article = $articles->increment('hit');
        return view('front.single',compact( 'articles', 'article'));
    }

    public function category($slug){
        $category = Category::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazi bulunamadı');
        $articles = Articles::where('category_id', $category->id)->orderBy('created_at','DESC')->with('category')->paginate(3);
        return view('front.category', compact('category', 'articles',));
    }

    public function page($slug){
        $page = Pages::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazi bulunamadı');
        return view('front.page',compact('page' ));
    }

    public function contact(){
        return view('front.contact');
    }
    public function contactpost(Request $request){
        $request->validate([
            'name' => 'required|string', // name sütunu boş olamaz ve bir metin olmalıdır.
            'email' => 'required|email',
            'topic' => 'required|string',
            'message' => 'required|string',
        ]);

        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success', 'Mesajınız bize iletildi. Teşekkür ederiz!');
    }
}
