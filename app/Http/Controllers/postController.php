<?php

namespace App\Http\Controllers;
use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class postController extends Controller
{
    public function index($id)
    {
        // Mengambil semua artikel
        $posts = article::all();
    
        // Mencari artikel pertama yang memiliki id sesuai dengan parameter $id
        $post = Arr::first($posts, function ($post) use ($id) {
            return $post->id == $id;
        });
    
        // Jika artikel tidak ditemukan
        if (!$post) {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan');
        }
    
        // Mengembalikan view dengan data artikel
        return view('post', compact('post'));
    }
    
}
