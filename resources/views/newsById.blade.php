@extends('layout')

@section('main_content')

    <h1>{{$news->title}}</h1>
    <h2>{{$news->description}}</h2>
    <h3>{{$news->text}}</h3>
    <a href="/update-news/{{$news->id}}">
        <button>Update</button>
    </a>
@endsection

