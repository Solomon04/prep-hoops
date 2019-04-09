@extends('layouts.app')

@section('content')
    @include('todo.components.view')
    @php
        if(!request()->has('date')){
            $date = 0;
        }else{
            $date = request('date');
        }

    @endphp
    <div class="container">
        <div class="text-center">
            @if(!isset($day))

                <h1> <a href="?date={{$date - 1}}">&#8249;</a>  {{\Carbon\Carbon::today()->toFormattedDateString('mm/dd/yy')}} <a href="?date={{$date + 1}}">&#8250;</a>   </h1>
            @else
                <h1><a href="?date={{$date - 1}}">&#8249;</a>  {{$day->toFormattedDateString('mm/dd/yy')}} <a href="?date={{$date + 1}}">&#8250;</a></h1>
            @endif
        </div>
        <form class="input-group mb-3" action="{{route('search.todo')}}" method="get">
            <input type="text" class="form-control" name="query" placeholder="Search all todo items" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Submit</button>
            </div>
        </form>
        <hr>
        <div class="row">

                @foreach($categories as $category)
                <div class="col-4 my-5">
                    <div class="text-center">
                        <a href="{{route('edit.category', ['id' => $category->id])}}" style="color: black">
                            <h2 style="text-decoration: underline"><b>{{$category->name}}</b></h2>
                        </a>
                    </div>
                    <ul class="list-group">
                    @foreach($todos as $todo)
                        @if($todo->category->name == $category->name)
                            <li class="list-group-item d-flex justify-content-between align-items-center" @if($todo->completed)style="opacity: .6"@endif>
                                <a href="#modal_{{$todo->id}}" data-toggle="modal" style="color: black">{{$todo->title}}</a>
                                @if($todo->completed)
                                <a href="{{route('incomplete.todo', ['id' => $todo->id])}}">
                                    <span class="badge badge-success badge-pill">&#10004;</span>
                                </a>
                                @else
                                    <a href="{{route('complete.todo', ['id' => $todo->id])}}">
                                        <span class="badge badge-primary badge-pill">&#10004;</span>
                                    </a>
                                @endif
                            </li>
                            @include('todo.components.todo-modal')
                        @endif
                    @endforeach
                    </ul>
                </div>
                @endforeach

        </div>
    </div>
@endsection
