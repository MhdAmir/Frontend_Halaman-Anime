<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{
    public function index(Request $request)
    {

        $posts = json_decode(Http::get('http://127.0.0.1/Halaman-Anime/public/api/posts'));
        $posts = $posts->data;

        // dd($posts);
        $token = $request->cookie('cookie_token');
        $answer = null;
        
        if ($token !== null) {
            // Assuming 'http://your-laravel-api-url/api/protected-endpoint' is the URL of your protected endpoint
            $url = 'http://127.0.0.1/Halaman-Anime/public/api/me';

            // Make a request to the protected endpoint with Bearer token authentication
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get($url);

            // Handle the response from the backend
            $answer =  $response->json();
        } else {
            // Handle the case where the token is not found in cookies
            $answer =  null;
        }

        $searchTerm = request('search');
        if ($searchTerm) {
            $filteredProducts = [];
            foreach ($posts as $post) {
                if (stripos($post->title, $searchTerm) !== false) {
                    $filteredProducts[] = $post;
                }
            }
            $posts = $filteredProducts;
        }
        $title = 'post';
        $slug = null;
        
        // dd($answer);
        return view('post.index', compact('posts', 'title', 'answer' ,'slug'));
    }

    public function show($id)
    {
        $post = json_decode(Http::get('http://127.0.0.1/Halaman-Anime/public/api/posts/' . $id));
        // dd($post);
        $post = $post->data;

        $title = 'post';
        return view('post.post', compact('post', 'title'));
    }
}
