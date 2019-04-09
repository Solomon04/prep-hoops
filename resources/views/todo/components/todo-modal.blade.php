<div class="modal fade" id="modal_{{$todo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
    </div>
</div>