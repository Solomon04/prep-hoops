@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Results:</h1>
        </div>
        <hr>
        <div class="row">
            @foreach($todos as $todo)
                <div class="col-4">
                    <div class="card-deck">
                        <div class="card w-33 my-3">
                            <div class="card-body" @if($todo->complete)style="color: grey"@endif>
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
        </div>
        <div class="justify-content-center my-5">
            {{$todos->appends(request()->except('page'))->links()}}
        </div>
    </div>
@endsection
