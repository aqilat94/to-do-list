<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;
use App\Jobs\SendReminderJob;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ToDoList::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return redirect()->route('show:list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $lists = auth()->user()->toDoList;

        return view('list.show', compact('lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDoList $list)
    {
        return view('list.edit', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDoList $list)
    {
        $list->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return redirect()->route('show:list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDoList $list)
    {
        $list->delete();
        
        return redirect()->route('show:list');
    }

    public function toggle(Request $request, ToDoList $list)
    {
        if ($list->reminder == 0){
            $list->update([
                'reminder' => 1,
            ]);

            $this->dispatch(new SendReminderJob($list));
        }
        else
        {
            $list->update([
                'reminder' => 0,
            ]);
        }

        return redirect()->route('show:list');
    }
}
