@extends('layouts.app')

@section('content')
    @include('todo.components.view')
    @include('todo.components.filter')
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
                <h1> <a href="?date={{$date - 1}}">&#8249;</a>  {{\Carbon\Carbon::today('America/Chicago')->toFormattedDateString('mm/dd/yy')}} <a href="?date={{$date + 1}}">&#8250;</a>   </h1>
            @else
                <h1><a href="?date={{$date - 1}}">&#8249;</a>  {{$day->toFormattedDateString('mm/dd/yy')}} <a href="?date={{$date + 1}}">&#8250;</a></h1>
            @endif
        </div>
        <form class="input-group mb-3" action="{{route('search.todo')}}" method="get">
            <input type="text" class="form-control" name="query" placeholder="Search for todo" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Submit</button>
            </div>
        </form>
        <hr>
        <div class="row">
            @foreach($todos as $todo)
                <div class="col-4">
                    <div class="card-deck">
                        <div class="card w-33 my-3">
                            <div class="card-body" @if($todo->completed)style="opacity: .6"@endif>
                                <h2 class="card-title" style="text-decoration: underline">{{$todo->title}}</h2>
                                <h4 class="card-title">{{$todo->category->name}}</h4>
                                <p class="card-text">{{$todo->description}}</p>

                                <a href="{{route('edit.todo', ['id' => $todo->id])}}" class="btn btn-primary">Edit</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['delete.todo', 'id' => $todo->id]]) }}
                                {{ Form::submit('Remove', ['class' => 'btn btn-danger my-2']) }}
                                {{ Form::close() }}
                                @if(!$todo->completed)
                                    <a href="{{route('complete.todo', ['id' => $todo->id])}}" class="btn btn-success btn-lg btn-block my-3">
                                        Mark As Complete
                                    </a>
                                @else
                                    <a href="{{route('incomplete.todo', ['id' => $todo->id])}}"class="btn btn-warning btn-lg btn-block my-3">
                                        Mark As Incomplete
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="col-12 collapse multi-collapse text-center" id="todoForm">
                <div class="card w-100 my-3">
                    <h3 class="card-title mt-2">Add TODO Item</h3>
                    <div class="card-body">
                        <form class="col-md-12 text-center" action="{{route('create.todo')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-12 col-form-label text-md-center">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <input id="title" placeholder="Get Groceries.." type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="title"  required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-12 col-form-label text-md-center">{{ __('Category') }}</label>

                                <select class="form-control" id="category" name="category">
                                    <option></option>
                                   @foreach($categories as $category)
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="deadline" class="col-md-12 col-form-label text-md-center">{{ __('Deadline Date') }}</label>

                                <div class="col-md-12">
                                    <input id="deadline" value="{{$date}}" type="date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="deadline"  required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-12 col-form-label text-md-center">{{ __('Description') }}</label>

                                <div class="col-md-12">
                                    <textarea id="description" type="text" class="form-control" rows="5" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create TODO') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <button type="button" data-toggle="collapse" data-target="#todoForm" aria-expanded="false" aria-controls="todoForm" class="btn btn-secondary btn-lg btn-block">
                    Add TODO
                </button>
            </div>
        </div>
    </div>
@endsection
