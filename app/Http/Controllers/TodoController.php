<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::latest()->get();

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ],[
            'title.required' => 'titleは必須です。',
            'body.required' => 'bodyは必須です。',
        ]);


        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->body = $request->input('body');
        $todo->save();

        return redirect()->route('todos.index')->with('flash_message', 'Todoを追加しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ],[
            'title.required' => 'titleは必須です。',
            'body.required' => 'bodyは必須です。',
        ]);

        $todo->title = $request->input('title');
        $todo->body = $request->input('body');
        $todo->update();

        return redirect()->route('todos.show', compact('todo'))->with('flash_message', 'Todoを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('flash_message', 'Todoを削除しました');
    }
}
