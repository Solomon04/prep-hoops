<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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

    /**
     * View all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        return view('categories.index')->with('categories', $user->category);
    }

    /**
     * Create category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        /** @var User $user */
        $user = Auth::user();
        $user->category()->create([
            'user_id' => $user->id,
            'name' => $validator['name'],
            'description' => $validator['description']
        ]);

        return redirect()->route('view.category')->with('success', 'Category Created!');
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
        $category = $user->category()->where('id', '=', $id)->first();
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update user category
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        /** @var User $user */
        $user = Auth::user();
        $user->category()->where('id', '=', $id)->update([
            'name' => $validator['name'],
            'description' => $validator['description']
        ]);
        return redirect()->route('view.category')->with('success', 'Category Updated!');
    }

    public function delete(Request $request)
    {
        /** @var Category $todo */
        $category = Category::findorFail($request->id);
        $category->delete();
        return back()->with('error', 'Category Removed');
    }
}
