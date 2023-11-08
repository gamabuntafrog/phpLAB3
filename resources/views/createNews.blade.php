@extends('layout')

@section('main_content')
    <h2>Create news</h2>

    <form action="/create-news" method="POST">
        @csrf

        <label for="title">title</label>
        <input minlength="3" id="title" name="title" type="text"><br />

        <label for="description">description</label>
        <input minlength="5" id="description" name="description" type="text"><br />

        <label for="text">text</label>
        <input minlength="10" id="text" name="text" type="text"><br />

        <button type="submit">Add</button>
    </form>
@endsection
