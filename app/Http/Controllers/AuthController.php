<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function index()
    {
        return view('Authentication.index', [
            'title' => 'login'
        ]);
    }

    // public function login(Request $request)
    // {
    //     $dataValid =  json_decode(Http::post('http://laravel-api-uas.test/api/login', $request));
    //     dd($dataValid);
    //     if ($dataValid->status == 'success') {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/');
    //     }

    //     return back()->with('loginError', 'Login Failed!');
    // }

    public function login(Request $request)
    {
        // dd("tai");
        // dd($request);
        $response = json_decode(Http::post('http://127.0.0.1/Halaman-Anime/public/api/login', $request));
        // Assuming a successful response
        $token = $response->token;
        // dd($token);
        if ($token!==null) {
            return response(redirect('/post'))->withCookie('cookie_token', $token, 60);
            // Store the token in a cookie
            // cookie('token', $token, 60); // Set cookie for 60 minutes
    
            // Redirect or perform other actions
            // return redirect('/');
        } else {
            // Handle failed login
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('cookie_token'));
        
            return response()->json([
                'message' => 'Logged out',
            ]);
        
        
    }

    public function try(Request $request)
    {
        $token = $request->cookie('token');
        dd($token);
        return response()->json(['message' => 'Logged out']);
    }
}
