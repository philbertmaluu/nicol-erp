<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shareholder;
use App\Models\Proxy;
use App\Models\Attentant;
use App\Models\Event;
use Illuminate\Support\Facades\Log;



class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $event = Event::find($id);
            if (!$event) {
                return redirect()->back()->with('error', 'Event not found');
            }
            // Check if there is already an active event
            $activeEvent = Event::where('is_active', 1)->first();
            if ($request->input('is_active') == 1 && $activeEvent && $activeEvent->id != $event->id) {
                return redirect()->back()->with('error', 'Another event is already active. Deactivate it first.');
            }
            // Capture the current status
            $currentStatus = $event->is_active;
            // Update the is_active column
            $event->update(['is_active' => $request->input('is_active')]);
            // Determine the response based on the change in status
            $responseMessage = ($currentStatus == 0 && $request->input('is_active') == 1)
                ? 'Event has been successfully activated'
                : (($currentStatus == 1 && $request->input('is_active') == 0) ? 'Event has been switched off successfully' : 'No change');

            return redirect()->back()->with('success', $responseMessage);
        } catch (\Exception $e) {
            Log::error('Error updating event: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Internal Server Error');
        }
    }




    public function records(string $eventId, string $eventName)
    {
        // $user = Auth::user();
        $event = Event::find($eventId);

        $proxiesNumber = Attentant::where('event_id', $eventId)
            ->where('attendant_type', 1)
            ->count();

        $shareholderNumber  = Attentant::where('event_id', $eventId)
            ->where('attendant_type', 0)
            ->count();
        // $attendanceReport = Attentant::where('event_id', $eventId)->get();
        $attendanceReport = Attentant::with('proxy')
            ->where('event_id', $eventId)
            ->where('attendant_type', 1)
            ->get();

        //dd($attendanceReport);
        $proxyIds = $attendanceReport->pluck('proxy_id')->toArray();
        $existingProxies = Proxy::whereIn('id', $proxyIds)->get();
        //dd($existingProxies);

        foreach ($existingProxies as $proxy) {
            $shareholderIds = json_decode($proxy->shareholder_id, true);

            if (!empty($shareholderIds) && is_array($shareholderIds)) {
                $shareholdersData = [];

                foreach ($shareholderIds as $data) {
                    if (is_string($data)) {
                        $data = explode(',', $data);
                    }

                    if (is_array($data)) {
                        $shareholders = Shareholder::whereIn('id', $data)->get();
                        $shareholdersData = array_merge($shareholdersData, $shareholders->toArray());
                    } else {
                        dd("Invalid data format in proxy with ID: {$proxy->id}");
                    }
                }

                $shareholderData[$proxy->id] = $shareholdersData;
                //dd($shareholderData);
            } else {
                dd("Invalid shareholder_ids format in proxy with ID: {$proxy->id}");
            }
        }
        $totalShareholders = 0;

        foreach ($shareholderData as $proxyId => $shareholders) {
            $totalShareholders += count($shareholders);
            //dd($totalShareholders);
        }
        $shareholderNumber = $totalShareholders + $shareholderNumber;

        $AttendanceReport = Attentant::where('event_id', $eventId)->get();
        $total = $AttendanceReport->sum('shares');
        $totalShares = number_format($total);
        $shareHolders = Attentant::where('event_id', $eventId)
            ->where('Attendant_type', 0)->get();

        $proxiesattendance = Attentant::where('event_id', $eventId)
            ->where('Attendant_type', 1)
            ->get();



        return view('EventRecord.index', compact('eventName', 'shareHolders', 'proxiesNumber', 'shareholderNumber', 'AttendanceReport', 'totalShares', 'eventId', 'shareholderData', 'proxiesattendance', 'event'));
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
        //
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
}
