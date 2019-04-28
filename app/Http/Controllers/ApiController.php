<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function total(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $date = Carbon::today('America/Chicago');
        $todo = $user->todoItem()->where('deadline', '=', $date->toDateString());
        return response(['count' => $todo->count(), 'todo' => $todo->get()]);
    }

    public function stats(Request $request){
        if($request->has('date')){
            $date = $request->date;
        }else{
            $date = Carbon::today('America/Chicago');
        }
        /** @var User $user */
        $user = Auth::user();
        $total = $user->todoItem()->where('deadline', '=', $date->toDateString())->count();
        $completed = $user->todoItem()->where('deadline', '=', $date->toDateString())
            ->where('completed', '=', true)
            ->count();
        if($total == 0){
            $rate = '0%';
        }else{
            $rate = number_format( $completed/$total * 100, 2 ) . '%';
        }
        $stats['total_tasks'] = $total;
        $stats['completed_tasks'] = $completed;
        $stats['success_rate'] = $rate;
        return response(['date' => $date->toDateString(), 'stats' => $stats]);
    }
}
