<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
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

    public function index(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if($request->has('date')){
            $today = Carbon::today('America/Chicago');
            $date = $today->add($request->date, 'day');
            $todo = $user->todoItem()->where('deadline', '=', $date->toDateString())->get();
            return view('todo.category')->with('todos', $todo)->with('categories', $user->category)->with('day', $date);
        }

        if($request->has('view')){
            if($request->view){
                $date = Carbon::today('America/Chicago');
                $todo = $user->todoItem()->where('deadline', '=', $date->toDateString())->get();
                return view('todo.index')->with('todos', $todo)->with('categories', $user->category);
            }
        }

        if($request->has('completed')){
            $todo = $user->todoItem()->where('completed', '=', $request->completed);
            return view('todo.category')->with('todos', $todo)->with('categories', $user->category);
        }

        if($request->has('category')){
            $todo = $user->todoItem()->where('category_id', '=', $request->category)->get();
            return view('todo.category')->with('todos', $todo)->with('categories', $user->category);
        }
        $date = Carbon::today('America/Chicago');
        $todo = $user->todoItem()->where('deadline', '=', $date->toDateString())->get();
        return view('todo.category')->with('todos', $todo)->with('categories', $user->category);
    }

    public function create(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $validator = $this->validate($request, [
            'title'=> 'required',
            'deadline'=> 'required',
            'description' => 'required',
        ]);
        $user->todoItem()->create([
            'user_id' => $user->id,
            'title' => $validator['title'],
            'category_id' => $request->category,
            'description' => $validator['description'],
            'deadline' => $validator['deadline']
        ]);
        return redirect()->route('view.todo')->with('success', 'TODO Item Created!');
    }

    /**
     * View single category
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $todo = $user->todoItem()->where('id', '=', $id)->first();
        return view('todo.edit')->with('todo', $todo)->with('categories', $user->category);
    }

    public function complete($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->todoItem()->where('id', '=', $id)->update(['completed' => true]);
        return redirect()->route('view.todo')->with('success', 'TODO marked as completed!');
    }

    public function incomplete($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->todoItem()->where('id', '=', $id)->update(['completed' => false]);
        return redirect()->route('view.todo')->with('error', 'TODO marked as incomplete!');
    }

    public function update($id, Request $request)
    {
        $validator = $this->validate($request, [
            'title'=> 'required',
            'deadline'=> 'required',
            'description' => 'required',
        ]);
        /** @var User $user */
        $user = Auth::user();
        $user->todoItem()->where('id', '=', $id)->update([
            'title' => $validator['title'],
            'category_id' => $request->category,
            'description' => $validator['description'],
            'deadline' => $validator['deadline']
        ]);
        return redirect()->route('view.todo')->with('success', 'TODO Updated!');
    }

    public function delete(Request $request)
    {
        /** @var TodoItem $todo */
        $todo = TodoItem::findorFail($request->id);
        $todo->delete();
        return back()->with('error', 'TODO Item Removed');
    }

    public function search(Request $request)
    {
        $validator = $this->validate($request, [
            'query' => 'required'
        ]);
        $query = $validator['query'];
        $todos = TodoItem::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(12);
        return view('todo.results')->with('todos', $todos);
    }
}
