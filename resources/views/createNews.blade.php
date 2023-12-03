@extends('layout')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create news
    </h2>
@endsection
@section('main_content')
    <form class="p-8" action="/create-news" method="POST">
        @csrf

        <div class="my-2 flex flex-col">
            <label for="title">Title</label>
            <input minlength="3" id="title" name="title" type="text">
        </div>

        <div class="my-2 flex flex-col">
            <label for="description">Description</label>
            <input minlength="5" id="description" name="description" type="text">
        </div>

        <div class="my-2 flex flex-col">
            <label for="text">Text</label>
            <textarea minlength="10" id="text" name="text" type="text"></textarea>
        </div>

        <button class="bg-gray-800 p-2 border-r-2 text-white mt-2" type="submit">Add</button>
    </form>
@endsection
