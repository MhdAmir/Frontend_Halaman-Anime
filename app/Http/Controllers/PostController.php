<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Spatie\FlareClient\Http\Client as HttpClient;

class PostController extends Controller
{
    function home(Request $request)
    {
        $posts = json_decode(Http::get('http://127.0.0.1/Halaman-Anime/public/api/posts'));
        $posts = $posts->data;

        $answer = $this->getMe($request);

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

        return view('home', compact('posts', 'title', 'answer', 'slug'));
    }

    function getMe(Request $request)
    {
        $token = $request->cookie('cookie_token');
        $answer = null;

        if ($token !== null) {
            $url = 'http://127.0.0.1/Halaman-Anime/public/api/me';

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get($url);

            $answer =  $response->json();
        }

        // dd($answer);
        return $answer;
    }

    public function index(Request $request)
    {

        $posts = json_decode(Http::get('http://127.0.0.1/Halaman-Anime/public/api/posts'));
        $posts = $posts->data;

        $answer = $this->getMe($request);

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

        return view('post.index', compact('posts', 'title', 'answer', 'slug'));
    }

    public function index_store(Request $request)
    {
        $answer = $this->getMe($request);

        return view('post.post_store', compact('answer'));
    }

    public function show(Request $request, $id)
    {
        $answer = $this->getMe($request);

        $post = json_decode(Http::get('http://127.0.0.1/Halaman-Anime/public/api/post/' . $id));
        $post = $post->data;
        // dd($post);
        $title = 'post';
        Session::put('post_id', $id);

        return view('post.post', compact('post', 'title', 'answer'));
    }

    public function showEdit(Request $request, $id)
    {
        $answer = $this->getMe($request);
        $post = json_decode(Http::get('http://127.0.0.1/Halaman-Anime/public/api/post/' . $id));
        $post = $post->data;


        $title = 'Post';
        return view('post.edit-post', compact('post', 'answer', 'title'));
    }

    public function destroy(Request $request, $id)
    {
        // $answer = $this->getMe($request);
        $token = $request->cookie('cookie_token');
        $url = 'http://127.0.0.1/Halaman-Anime/public/api/post/' . $id;

        $answer = $this->getMe($request);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete($url);

        // dd($response);
        return back();
    }

    public function showByUser(Request $request, $username)
    {
        $answer = $this->getMe($request);

        $post = json_decode(Http::get('http://127.0.0.1/Halaman-Anime/public/api/posts/' . $username));
        $post = $post->data;

        dd($post);

        $title = 'Dashboard';
        return view('Dashboard.index', compact('products', 'title', 'answer'));
    }



    public function store(Request $request)
    {
        $token = $request->cookie('cookie_token');

        // dd($request);
        $file = request('image');
        $file_path = $file->getPathName();
        $file_mime = $file->getMimeType('image');
        $file_uploaded_name = $file->getClientOriginalName();

        $url = 'http://127.0.0.1/Halaman-Anime/public/api/post';

        $client = new Client();
        // dd($request->description);
        $response = $client->request("POST", $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ],
            'multipart' => [
                [
                    'name' => 'file',
                    'filename' => $file_uploaded_name,
                    'Mime-Type' => $file_mime,
                    'contents' => fopen($file_path, 'r')
                ],
                [
                    'name' => 'title',
                    'contents' => $request->title
                ],
                [
                    'name' => 'description',
                    'contents' => $request->description
                ],
            ]
        ]);

        $responseData = json_decode($response->getBody(), true);
        // dd($responseData);
        return redirect('/post');
    }

    public function update(Request $request, $id)
    {
        $answer = $this->getMe($request);

        $token = $request->cookie('cookie_token');
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->patch('http://127.0.0.1/Halaman-Anime/public/api/post/' . $id, $data);

        return redirect('/post');
    }
}
