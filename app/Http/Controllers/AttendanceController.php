<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shareholder;
use App\Models\proxy;
use App\Models\Event;
use App\Models\Attentant;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $shareholders = Shareholder::all();
        // return view('Attendance.index', compact('shareholders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventId = $request->input('eventId');
        $request->validate([
            'shareholder_id' => 'required',
        ]);
        $shareholderId = $request->input('shareholder_id');
        $existingRecord = Attentant::where('event_id', $eventId)
            ->where('shareholder_id', $shareholderId)
            ->exists();
        if ($existingRecord) {
            return redirect()->back()->with('success', 'Shareholder is already marked for this event.');
        } else {
            $shareholderData = Shareholder::find($shareholderId);

            $shareholderRecord = new attentant;
            $shareholderRecord->CSD = $shareholderData->CSD;
            $shareholderRecord->name = $shareholderData->Name;
            $shareholderRecord->shares = $shareholderData->shares;
            $shareholderRecord->event_id =  $eventId;
            $shareholderRecord->shareholder_id = $shareholderId;
            $shareholderRecord->save();

            return redirect()->back()->with('success', 'Shareholder marked succesfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function markAttendance(string $eventId, string $eventName)
    {

        $user = Auth::user();
        $proxies = proxy::all();
        $shareholderRecord = Attentant::where('event_id', $eventId)->get();
        $shareholders = Shareholder::all();
        return view('Attendance.index', compact('eventName', 'user', 'shareholders', 'proxies', 'shareholderRecord', 'eventId'));
    }
}
