<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function stats()
    {
        /** @var User $user */
        $user = Auth::user();
        return view('stats')->with('stats', $user->getStats());
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
