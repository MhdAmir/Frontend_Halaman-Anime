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
    public function indexr()
    {
        return view('Authentication.register', [
            'title' => 'register'
        ]);
    }


    public function login(Request $request)
    {
        
        $response = json_decode(Http::post('http://127.0.0.1/Halaman-Anime/public/api/login', $request));
        $token = $response->token;
        if ($token!==null) {
            return response(redirect('/post'))->withCookie('cookie_token', $token, 60);
        } else {
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $data = [
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
        ];
        $response = json_decode(Http::post('http://127.0.0.1/Halaman-Anime/public/api/register', $data));

        if ($response !== null) {
            return redirect('/login');
        } else {
            return redirect('/register')->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('cookie_token');

        if ($token !== null) {
            // dd($token);
            $url = 'http://127.0.0.1/Halaman-Anime/public/api/logout';

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get($url);
            
            // Check if the API response is unauthorized
            if ($response->status() === 401) {
                return response()->json([
                    'message' => 'Unauthorized',
                ], 401);
            }

            Cookie::queue(Cookie::forget('cookie_token'));
            return back();
        } 
    }

}
