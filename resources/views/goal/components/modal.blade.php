<div class="modal fade" id="modal_{{$goal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$goal->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card w-33 my-3">
                    <div class="card-body" @if($goal->completed)style="opacity: .6"@endif>
                        <h2 class="card-title" style="text-decoration: underline">{{$goal->title}}</h2>
                        <h4 class="card-title">{{$goal->category->name}}</h4>
                        <p class="card-text">{{$goal->description}}</p>

                        <a href="{{route('edit.goal', ['id' => $goal->id])}}" class="btn btn-primary">Edit</a>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['delete.goal', 'id' => $goal->id]]) }}
                        {{ Form::submit('Remove', ['class' => 'btn btn-danger my-2']) }}
                        {{ Form::close() }}
                        @if(!$goal->completed)
                            <a href="{{route('complete.goal', ['id' => $goal->id])}}" class="btn btn-success btn-lg btn-block my-3">
                                Mark As Complete
                            </a>
                        @else
                            <a href="{{route('incomplete.goal', ['id' => $goal->id])}}"class="btn btn-warning btn-lg btn-block my-3">
                                Mark As Incomplete
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>