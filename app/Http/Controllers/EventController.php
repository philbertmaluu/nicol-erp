<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\proxy;
use App\Models\shareholder;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shareholders = Shareholder::all();
        $event = Event::all();
        return view('Events.index', compact('event', 'shareholders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        $event = new event;
        $event->name = $request->name;
        $event->eventDate = $request->date;
        $event->startTime = $request->time;
        $event->save();
        return redirect()->back()->with('success', 'Event successfully created');
    }

    public function proxystore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'shareholders' => 'required'
        ]);
        $proxy = new proxy;
        $proxy->name = $request->name;
        $proxy->phone = $request->phone;
        $proxy->shareholders = $request->shareholders;
        $proxy->save();
        return redirect()->back() - with('success', 'proxy created sucessfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Event $event)
    {

        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $event->name = $request->name;
        $event->eventDate = $request->date;
        $event->startTime = $request->time;

        $event->save();
        return redirect()->back()->with('success', 'Event successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Event successfully deleted');
    }
}
