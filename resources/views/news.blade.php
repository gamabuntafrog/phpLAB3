@extends('layout')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        News
    </h2>
@endsection
@section('main_content')
    <ul class="m-2">
    @foreach($news as $obj)
        <li class="m-2 p-2 bg-gray-200">
            <a class="font-bold text-gray-950 underline" href="news/{{$obj->id}}">
                <h3>{{$obj->title}}</h3>
            </a>
            <h3>{{$obj->description}}</h3>
            <h3>{{$obj->text}}</h3>
        </li>
    @endforeach
    </ul>
@endsection
