<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Author List';
        $data['authors']=Author::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('admin.author.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create new Author';
        return view('admin.author.create',$data);
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
            'name'      =>'required',
            'email'     =>'required|email',
            'phone'     =>'required',
            'address'   =>'required',
            'gender'    =>'required',
        ]);

        $author = $request->except('_token');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move('images/author/', $file->getClientOriginalName());
            $author['image'] = 'images/author/'.$file->getClientOriginalName();
        }

        Author::create($author);
        session()->flash('message','Author created successfully');
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $data['title']='Edit Author';
        $data['author']=$author;
        return view('admin.author.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name'      =>'required',
            'email'     =>'required|email',
            'phone'     =>'required',
            'address'   =>'required',
            'gender'    =>'required',
        ]);

        $author_r = $request->except('_token');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move('images/author/', $file->getClientOriginalName());
            File::delete($author->image);
            $author_r['image'] = 'images/author/'.$file->getClientOriginalName();
        }

        $author->update($author_r);
        session()->flash('message','Author updated successfully');
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        File::delete($author->image);
        $author->delete();
        session()->flash('message','Author deleted successfully');
        return redirect()->route('author.index');
    }
}
