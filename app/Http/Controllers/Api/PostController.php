<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function posts(){

        // recupero tuti i posts
        $posts = Post::all();

        // restituisco il json con tutti i posts
        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }
}
