<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data['featured_posts'] = Post::with('category','author')->where('status','published')->limit(3)->latest()->get();
        $data['recent_posts'] = Post::with('category','author')->where('status','published')->limit(3)->latest()->get();
        $data['most_viewed_posts'] = Post::with('category')
            ->orderBy('total_view','DESC')
            ->limit(5)
            ->get();
        return view('front.home',$data);
    }

    public function blog_details($id)
    {
        $posts = Post::findOrFail($id);
        $data['blog_details'] = $posts;
        $posts->increment('total_view');

        return view('front.blog.details',$data);
    }
    public function category_blogs($id)
    {
        $data['posts'] = Post::with('category', 'author')->where('category_id', $id)->where('status', 'published')->orderBy('id', 'DESC')->paginate(2);
        $data['category'] = Category::findOrFail($id);
        return view('front.blog.category_posts',$data);
    }
}
