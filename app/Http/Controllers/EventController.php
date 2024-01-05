<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\proxy;
use App\Models\shareholder;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shareholders = Shareholder::all();
        $events = Event::all();
        return view('Events.index', compact('events', 'shareholders'));
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
            'endtime' => 'required',
        ]);
        $event = new event;
        $event->name = $request->name;
        $event->eventDate = $request->date;
        $event->Location = $request->location;
        $event->startTime = $request->time;
        $event->endTime = $request->endtime;
        $event->is_active = 0;
        $event->save();
        return redirect()->back()->with('success', 'Event successfully created');
    }


    public function updateStatus(Request $request, $eventId)
    {
        // Validate request
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        // Find the event by ID
        $event = Event::findOrFail($eventId);

        // Update the is_active column
        $event->update([
            'is_active' => $request->input('is_active'),
        ]);

        // You can return a response if needed
        return response()->json(['message' => 'Event status updated successfully']);
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
