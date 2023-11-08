@extends('layout')

@section('main_content')
    <h1>News</h1>
    <ul>
    @foreach($news as $obj)
        <li>
            <a href="news/{{$obj->id}}">
                <h3>{{$obj->title}}</h3>
            </a>
            <h3>{{$obj->description}}</h3>
            <h3>{{$obj->text}}</h3>
            <a href="update-news/{{$obj->id}}">
                <button>Update</button>
            </a>
        </li>
    @endforeach
    </ul>
@endsection
