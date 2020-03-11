@extends('layouts.app')

@section('content')
<form action="/update/{{$post->id}}" method="POST">
    {{@csrf_field() }}
    {{ method_field('PATCH') }}
<input type="text" name="title" id="" value="{{$post->title}}">
    <input type="text" name="body" id="" value="{{$post->body}}">
    <input type="submit"  value="update">
</form>

@foreach ($post->notes as $p)
    <ul>
        <li>
            <a href="#">
                {{$p->title}}
            </a>
         @if (Auth::check())
         <a href="" class="btn btn-success">update</a>
         @endif
        </li>
    </ul>
@endforeach
@endsection