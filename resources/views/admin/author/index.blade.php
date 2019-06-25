@extends('layouts.theme1.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    <a href="{{route('author.create')}}" class="btn btn-primary">Add New</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Enail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{$author->name}}</td>
                                    <td>{{$author->email}}</td>
                                    <td>{{$author->phone}}</td>
                                    <td>{{$author->address}}</td>
                                    <td>{{$author->DOB}}</td>
                                    <td>{{ucfirst($author->gender)}}</td>
                                    <td>
                                        <a href="{{route('author.edit',$author->id)}}" class="btn btn-cyan float-left">Edit</a>
                                        <form method="post" action="{{route('author.destroy',$author->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger " onclick="return confirm('Are you sure to Delete this Author')">Delete</button>
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