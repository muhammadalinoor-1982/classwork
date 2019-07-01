<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data['featured_posts'] = Post::with('category','author')->where('status','published')->limit(3)->latest()->get();
        $data['recent_posts'] = Post::with('category','author')->where('status','published')->limit(3)->latest()->get();
        return view('front.home',$data);
    }

    public function blog_details($id)
    {
        $data['blog_details'] = Post::findOrFail($id);
        $data['featured_posts'] = Post::where('is_featured',1)->where('status','published')->limit(2)->latest()->get();
        $data['recent_posts'] = Post::with('category','author')->where('status','published')->limit(4)->latest()->get();

        return view('front.blog.details',$data);
    }
}
