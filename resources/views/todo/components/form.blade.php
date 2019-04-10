<form class="input-group my-3" action="{{route('search.todo')}}" method="get">
    <input type="text" class="form-control" name="query" placeholder="Search all todo items" aria-describedby="basic-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Submit</button>
    </div>
</form>
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
                        <input id="deadline" type="date" @if(isset($day)) value="{{$day->toDateString()}}" @else value="{{Carbon\Carbon::today('America/Chicago')->toDateString()}}"  @endif class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="deadline"  required autofocus>
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
    <button type="button" data-toggle="collapse" data-target="#todoForm" aria-expanded="false" aria-controls="todoForm" class="btn btn-success btn-lg btn-block">
        Add TODO
    </button>
</div>
<script>
    document.getElementById('deadline').value = new Date().toDateInputValue();
</script>