@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1> Goals </h1>
        </div>
        @include('goal.components.form')
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
                        @foreach($goals as $goal)
                            @if($goal->category->name == $category->name)
                                <li class="list-group-item d-flex justify-content-between align-items-center" @if($goal->completed)style="opacity: .6"@endif>
                                    <a href="#modal_{{$goal->id}}" data-toggle="modal" style="color: black">{{$goal->title}}</a>
                                    @if($goal->completed)
                                        <a href="{{route('incomplete.goal', ['id' => $goal->id])}}">
                                            <span class="badge badge-success badge-pill">&#10004;</span>
                                        </a>
                                    @else
                                        <a href="{{route('complete.goal', ['id' => $goal->id])}}">
                                            <span class="badge badge-primary badge-pill">&#10004;</span>
                                        </a>
                                    @endif
                                </li>
                                @include('goal.components.modal')
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach

        </div>
    </div>
@endsection
