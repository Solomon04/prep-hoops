@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> My Categories </h1>
        <hr>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-12">
                    <div class="card w-100 my-3">
                        <div class="card-body">
                            <h3 class="card-title">{{$category->name}}</h3>
                            <p class="card-text">{{$category->description}}</p>
                            <a href="{{route('edit.category', ['id' => $category->id])}}" class="btn btn-primary">Edit</a>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['delete.category', 'id' => $category->id]]) }}
                            {{ Form::submit('Remove', ['class' => 'btn btn-danger my-2']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 collapse multi-collapse text-center" id="categoryForm">
                <div class="card w-100 my-3">
                    <h3 class="card-title mt-2">Add Category</h3>
                    <div class="card-body">
                        <form class="col-md-12 text-center" action="{{route('create.category')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" placeholder="Work" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  required autofocus>
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
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <button type="button" data-toggle="collapse" data-target="#categoryForm" aria-expanded="false" aria-controls="categoryForm" class="btn btn-secondary btn-lg btn-block">
                    Add Category
                </button>
            </div>
        </div>
    </div>
@endsection
