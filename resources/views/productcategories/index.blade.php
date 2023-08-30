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
            <th scope="col">Id</th>
            <th scope="col">Id Product</th>
            <th scope="col">Name Product</th>
            <th scope="col">Id Category</th>
            <th scope="col">Name Category</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->product_id}}</td>
                <td>{{\App\Models\Product::find($row->product_id)['name']}}</td>
                <td>{{$row->category_id}}</td>
                <td>{{\App\Models\Category::find($row->category_id)['name']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
