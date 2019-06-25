@extends('layouts.theme1.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    <a href="{{route('category.create')}}" class="btn btn-primary">Add New</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->details}}</td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-cyan float-left">Edit</a>
                                    <form method="post" action="{{route('category.destroy',$category->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger " onclick="return confirm('Are you sure to Delete this one')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection