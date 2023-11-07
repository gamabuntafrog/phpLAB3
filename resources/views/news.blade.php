@extends('layout')

@section('main_content')
    <h1>News</h1>
    <ul>
    @foreach($news as $obj)
        <li>
            <a href="update-news/{{$obj->id}}">
                <h3>{{$obj->title}}</h3>
                <h3>{{$obj->description}}</h3>
                <h3>{{$obj->text}}</h3>
            </a>
        </li>
    @endforeach
    </ul>
@endsection
