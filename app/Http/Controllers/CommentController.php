<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $id = Session::get('post_id');
        $token = $request->cookie('cookie_token');
        $answer = null;
        $data = [
            'post_id' => $id,
            'comments_content' => $request->comments_content,
            // Add other fields as needed
        ];
        // dd($data);
        if ($token !== null) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post('http://127.0.0.1/Halaman-Anime/public/api/comment', $data);
            
            // dd($response);
            $answer =  $response->json();
        } if ($answer!==null) {
            return redirect('/post/'.$id);
        }
        else {
            return redirect('/post')->with('error', 'Invalid credentials');
        }
    }
}
