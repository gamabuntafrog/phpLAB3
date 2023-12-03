@extends('layout')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        News by id
    </h2>
@endsection
@section('main_content')

    <h1 class="m-2">{{$news->title}}</h1>
    <h2 class="m-2">{{$news->description}}</h2>
    <h3 class="m-2">{{$news->text}}</h3>

    @if($can_update)
    <a href="/update-news/{{$news->id}}">
        <button class="bg-gray-800 p-2 border-r-2 text-white m-2">Update</button>
    </a>
    @endif

    @if($is_super_admin)
        <a href="/delete-news/{{$news->id}}">
            <button class="bg-gray-800 p-2 border-r-2 text-white m-2">Delete</button>
        </a>
    @endif
@endsection

