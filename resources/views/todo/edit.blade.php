@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Update Category </h1>
        <hr>
        <form class="col-md-12 text-center" action="{{route('update.todo', ['id' => $todo->id])}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-12 col-form-label text-md-center">{{ __('Title') }}</label>

                <div class="col-md-12">
                    <input id="title" placeholder="Work" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{$todo->title}}"  required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-md-12 col-form-label text-md-center">{{ __('Category') }}</label>

                <select class="form-control" id="category" name="category">
                    <option>{{$todo->category->name}}</option>
                    @foreach($categories as $category)
                        @if($todo->category->id == $category->id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-12 col-form-label text-md-center">{{ __('Description') }}</label>

                <div class="col-md-12">
                    <textarea id="description" type="text" class="form-control" rows="5" name="description">{{$todo->description}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="deadline" class="col-md-12 col-form-label text-md-center">{{ __('Deadline Date') }}</label>

                <div class="col-md-12">
                    <input id="deadline"  type="date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="deadline"  required autofocus>
                </div>
            </div>



            <div class="form-group row mb-4">
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        {{ __('Update TODO Item') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
