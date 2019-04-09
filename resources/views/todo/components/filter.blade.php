<div class="container-fluid">
    <div class="float-right  btn-group">
        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="?completed=1"> Completed Tasks </a>
            <a class="dropdown-item" href="?view=1"> By Category </a>
            <a class="dropdown-item" href="?completed=0"> Incomplete Tasks Only </a>
            @foreach($categories as $category)
                <a class="dropdown-item" href="?category={{$category->id}}"> {{$category->name}} Only</a>
            @endforeach
        </div>
    </div>
</div>