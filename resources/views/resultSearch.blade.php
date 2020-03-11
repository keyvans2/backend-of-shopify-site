@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h6 class="text-right" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-weight:bold;">
           <span style="color:blue;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">{{$id}}</span> :  نتایج یافت شده از 
        </h6>
        <ul class="list-group">
          @foreach ($f as $item)
          <li class="list-group-item">
                {{$item->name}}
                @foreach ($item->cats as $i)
                <span class="float-right">
                    {{$i->name}}
                </span>
                @endforeach
         </li>
          @endforeach
        </ul>
        </div>
    </div>
</div>

@endsection