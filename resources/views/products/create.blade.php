@extends('main')
@section('title', 'Create Product')
@section('content')
    <form action="{{route('products.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name Product</label>
            <input class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="is_published" name="is_published">
            <label class="form-check-label" for="is_published">is_published</label>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
