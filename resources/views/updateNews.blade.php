@extends('layout')

@section('main_content')
    <h2>Update news ({{$news->id}})</h2>

    <form action="/update-news/{{$news->id}}" method="POST">
        @csrf

        <label for="title">title</label>
        <input value="{{$news->title}}" minlength="3" id="title" name="title" type="text"><br />

        <label for="description">description</label>
        <input value="{{$news->description}}" minlength="5" id="description" name="description" type="text"><br />

        <label for="text">text</label>
        <input value="{{$news->text}}" minlength="10" id="text" name="text" type="text"><br />

        <button type="submit">Update</button>
    </form>
@endsection
