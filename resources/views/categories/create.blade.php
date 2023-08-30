@extends('main')
@section('title', 'Create Product')
@section('content')
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name Category</label>
            <input class="form-control" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
