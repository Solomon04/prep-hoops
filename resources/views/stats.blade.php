@extends('layouts.app')

@section('content')
    @php
        if(!request()->has('date')){
            $date = 0;
        }else{
            $date = request('date');
        }

    @endphp
    <div class="container">
        <div class="text-center">
            @if(!isset($day))

                <h1> <a href="?date={{$date - 1}}">&#8249;</a>  {{\Carbon\Carbon::today()->toFormattedDateString('mm/dd/yy')}} <a href="?date={{$date + 1}}">&#8250;</a>   </h1>
            @else
                <h1><a href="?date={{$date - 1}}">&#8249;</a>  {{$day->toFormattedDateString('mm/dd/yy')}} <a href="?date={{$date + 1}}">&#8250;</a></h1>
            @endif
        </div>
        <hr>
        <div class="row my-3">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h4 class="card-title my-3">Total Tasks</h4>
                        <h2><i class="fa fa-plus-square fa-3x"></i></h2>
                    </div>
                    <div class="row px-2 no-gutters">
                        <div class="col-12">
                            <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">{{$stats['total_tasks']}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        The total number of tasks for
                        @if(!isset($day))
                           {{\Carbon\Carbon::today()->toFormattedDateString('mm/dd/yy')}}
                        @else
                            {{$day->toFormattedDateString('mm/dd/yy')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h4 class="card-title my-3">Completed Tasks</h4>
                        <h2><i class="fa fa-check-square fa-3x"></i></h2>
                    </div>
                    <div class="row px-2 no-gutters">
                        <div class="col-12">
                            <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">{{$stats['completed_tasks']}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        The total number of completed tasks for
                        @if(!isset($day))
                            {{\Carbon\Carbon::today()->toFormattedDateString('mm/dd/yy')}}
                        @else
                            {{$day->toFormattedDateString('mm/dd/yy')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h4 class="card-title my-3">Success Rate</h4>
                        <h2><i class="fa fa-percent fa-3x"></i></h2>
                    </div>
                    <div class="row px-2 no-gutters">
                        <div class="col-12">
                            <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">{{$stats['success_rate']}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        The rate at which you complete tasks for
                        @if(!isset($day))
                            {{\Carbon\Carbon::today()->toFormattedDateString('mm/dd/yy')}}
                        @else
                            {{$day->toFormattedDateString('mm/dd/yy')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
