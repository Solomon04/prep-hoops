<div class="col-12 collapse multi-collapse text-center" id="todoForm">
    <div class="card w-100 my-3">
        <h3 class="card-title mt-2">Add Goal</h3>
        <div class="card-body">
            <form class="col-md-12 text-center" action="{{route('create.goal')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-12 col-form-label text-md-center">{{ __('Name') }}</label>

                    <div class="col-md-12">
                        <input id="title" placeholder="Buy a Tesla.." type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="title"  required autofocus>
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
                    <label for="description" class="col-md-12 col-form-label text-md-center">{{ __('Description') }}</label>

                    <div class="col-md-12">
                        <textarea id="description" type="text" class="form-control" rows="5" name="description"></textarea>
                    </div>
                </div>



                <div class="form-group row mb-4">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create Goal') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="col-12">
    <button type="button" data-toggle="collapse" data-target="#todoForm" aria-expanded="false" aria-controls="todoForm" class="btn btn-success btn-lg btn-block">
        Add Goal
    </button>
</div>
