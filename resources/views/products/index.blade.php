@extends('main')
@section('title', 'Product Index')
@section('content')
    <div>
        <nav>
            <ul>
                <li><a href="{{route('products.create')}}">Create Product</a></li>
            </ul>
        </nav>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">is_published</th>
            <th scope="col">is_deleted</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->description}}</td>
                <td>{{$row->price}}</td>
                <td>{{$row->is_published}}</td>
                <td>{{$row->is_deleted}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
