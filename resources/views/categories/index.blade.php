@extends('main')
@section('title', 'Product Index')
@section('content')
    <div>
        <nav>
            <ul>
                <li><a href="{{route('category.create')}}">Create Category</a></li>
            </ul>
        </nav>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
