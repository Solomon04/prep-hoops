<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function stats(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $today = Carbon::today('America/Chicago');
        $date = $today->add($request->date, 'day');
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
        return view('stats')->with('stats', $stats)->with('day', $date);;
    }

    public function updateAvatar(Request $request)
    {

    }

    public function deleteAccount(Request $request)
    {

    }

    public function updatePassword(Request $request)
    {

    }

}
