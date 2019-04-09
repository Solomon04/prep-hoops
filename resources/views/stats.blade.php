@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row my-3">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h4 class="card-title">Total TODO Tasks</h4>
                        <h2><i class="fa fa-plus-square fa-3x"></i></h2>
                    </div>
                    <div class="row px-2 no-gutters">
                        <div class="col-12">
                            <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">{{$stats['total_tasks']}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        The sum of all your todo items with the app.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h4 class="card-title">Total Completed Tasks</h4>
                        <h2><i class="fa fa-check-square fa-3x"></i></h2>
                    </div>
                    <div class="row px-2 no-gutters">
                        <div class="col-12">
                            <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">{{$stats['completed_tasks']}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        The sum of your completed items with the app.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h4 class="card-title">Success Rate</h4>
                        <h2><i class="fa fa-percent fa-3x"></i></h2>
                    </div>
                    <div class="row px-2 no-gutters">
                        <div class="col-12">
                            <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">{{$stats['success_rate']}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        The rate at which you finish tasks.
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
