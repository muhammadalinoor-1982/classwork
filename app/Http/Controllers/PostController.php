<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Post List';
        $data['posts']=Post::with('category','author')->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create new Post';
        $data['categories']=Category::orderBy('name')->get();
        $data['authors']=Author::orderBy('name')->get();
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>'required',
            'details'       =>'required',
            'category_id'   =>'required',
            'author_id'     =>'required',
            'status'        =>'required',
        ]);

        $post = $request->except('_token');


        // File upload
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('images/post/', $file->getClientOriginalName());
            $post['file'] = 'images/post/'.$file->getClientOriginalName();
        }

        Post::create($post);
        session()->flash('message','Post created successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $data['title']='Edit Post';
        $data['post']=$post;
        $data['categories']=Category::orderBy('name')->get();
        $data['authors']=Author::orderBy('name')->get();
        return view('admin.post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            'title'         =>'required',
            'details'       =>'required',
            'category_id'   =>'required',
            'author_id'     =>'required',
            'status'        =>'required',
        ]);

        $post_r = $request->except('_token');


        // File upload
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('images/post/', $file->getClientOriginalName());
            File::delete($post->file);
            $post_r['file'] = 'images/post/'.$file->getClientOriginalName();
        }

        $post->update($post_r);
        session()->flash('message','Post updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        File::delete($post->file);
        $post->delete();
        session()->flash('message','Post deleted successfully');
        return redirect()->route('post.index');
    }
}
