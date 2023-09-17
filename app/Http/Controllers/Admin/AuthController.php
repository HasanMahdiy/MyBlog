<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){

        return view('admin.auth.login');
    }

    public function loginPost(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('admin.category.index');
        }

            return redirect()->back()->with('login','Kullanıcı Adınız veya Şifreniz hatalı!');
        }

    public function registar(){
        return view('admin.auth.registar');
    }
        public function registarPost(Request $request){
            $request->validate([
                'name'=>"required",
                'email' => "required|email|unique:users,email",
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('admin.login')->with('registar','Kayıt İşlemi Başarılı');
        }

}
