<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ListItem;

class ListitemController extends Controller
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
     * Show the listitem page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        return view('list');
    }

    public function add(Request $request) {

        $validatedData = $request->validate([
            'title' => 'required|unique:listitems|min:5|max:100',
            'content' => 'required|max:1000',
        ]);

        $listItem = ListItem::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => auth()->user()->id,
        ]);

        if (!$listItem) {
            return redirect('/your-list')->with('error', 'An error occurred');
        }

        return redirect('/your-list')->with('status', 'Listitem created');
    }

    public function updateShow(Request $request, $id) {

        if (!auth()->user()->listitems()->where('id', $id)->exists()) {
            return redirect('/your-list')->with('error', 'Not found');
        }

        $listItem = auth()->user()->listitems()->where('id', $id)->first();

        return view('list', compact('listItem'));
    }

    public function updateComplete(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:listitems,id,' . $id . '|min:5|max:100',
            'content' => 'required|max:1000',
        ]);

        if (!auth()->user()->listitems()->where('id', $id)->exists()) {
            return redirect('/your-list')->with('error', 'Not found');
        }

        $listItem = auth()->user()->listitems()->where('id', $id)->first();

        $listItem->title = $validatedData['title'];
        $listItem->content = $validatedData['content'];
        $listItem->save();

        return redirect('/your-list')->with('status', 'Listitem updated');
    }

    public function delete(Request $request, $id)
    {
        if (!auth()->user()->listitems()->where('id', $id)->exists()) {
            return redirect('/your-list')->with('error', 'Not found');
        }

        auth()->user()->listitems()->where('id', $id)->delete();

        return redirect('/your-list')->with('status', 'Listitem deleted');
    }
}
