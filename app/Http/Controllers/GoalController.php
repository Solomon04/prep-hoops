<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
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
        /** @var User $user */
        $user = Auth::user();
        $goal = $user->goal()->get();
        return view('goal.category')->with('goals', $goal)->with('categories', $user->category);
    }

    public function create(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $validator = $this->validate($request, [
            'title'=> 'required',
            'category'=> 'required',
            'description' => 'required',
        ]);
        $user->goal()->create([
            'user_id' => $user->id,
            'title' => $validator['title'],
            'category_id' => $request->category,
            'description' => $validator['description']
        ]);
        return redirect()->route('view.goal')->with('success', 'Goal Created!');
    }

    public function read($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $goal = $user->goal()->where('id', '=', $id)->first();
        return view('goal.edit')->with('goal', $goal)->with('categories', $user->category);
    }

    public function update($id, Request $request)
    {
        $validator = $this->validate($request, [
            'title'=> 'required',
            'description' => 'required',
        ]);
        /** @var User $user */
        $user = Auth::user();
        $user->goal()->where('id', '=', $id)->update([
            'title' => $validator['title'],
            'category_id' => $request->category,
            'description' => $validator['description'],
        ]);
        return redirect()->route('view.goal')->with('success', 'Goal Updated!');
    }

    public function delete(Request $request)
    {
        /** @var Goal $goal */
        $goal = Goal::findorFail($request->id);
        $goal->delete();
        return back()->with('error', 'Goal Removed');
    }
}
