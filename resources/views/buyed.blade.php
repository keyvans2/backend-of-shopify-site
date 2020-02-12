@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-group">
               @foreach ($all as $a)
               <li class="list-group-item">
                 <span class="text-left float-left">   {{ $a->name}}</span>
               <span  class="text-right float-right font-weight-bold ">product code:<a href="{{ url('testR/'.$a->id) }}" class="text-info">{{ $a->proCode}}</a>  </span>
                </li>
               @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection