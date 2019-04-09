@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Update Category </h1>
        <hr>
        <form class="col-md-12 text-center" action="{{route('update.category', ['id' => $category->id])}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Name') }}</label>

                <div class="col-md-12">
                    <input id="name" placeholder="Work" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$category->name}}"  required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-12 col-form-label text-md-center">{{ __('Description') }}</label>

                <div class="col-md-12">
                    <textarea id="description" type="text" class="form-control" rows="5" name="description">{{$category->description}}</textarea>
                </div>
            </div>

            <div class="form-group row mb-4">
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        {{ __('Update Category') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
