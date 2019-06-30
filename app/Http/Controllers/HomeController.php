<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['recent_post'] = Post::with('category','author')->where('status','published')->limit(3)->latest()->get();
        return view('front.home',$data);
    }
}
