<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shareholder;
use App\Models\proxy;
use App\Models\Event;
use App\Models\Attentant;
use Illuminate\Support\Facades\Auth;

class ProxyAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'proxy_id' => 'required',
        ]);
        $proxyId = $request->input('proxy_id');

        $existingRecord = Attentant::where('event_id', $eventId)
            ->where('proxy_id', $proxyId)
            ->exists();
        if ($existingRecord) {
            return redirect()->back()->with('error', 'Proxy is already marked for this event.');
        } else {

            $shareholderData = Proxy::find($proxyId);
            $shareholderIds = $shareholderData->shareholder_id;

            $object = json_decode($shareholderIds, true);

            // explode() method is used to remove ',' from the json
            // implode() method is used to convert the json array to string
            $shareholderIdsArray = explode(',', implode($object));
            //get all the shareholder detail which are represented by a particular proxy..
            $shareholderDatacollection = Shareholder::whereIn('id', $shareholderIdsArray)->get();
            $totalShares = $shareholderDatacollection->sum('shares');

            $shareholderRecord = new attentant;
            $shareholderRecord->CSD = 0000;
            $shareholderRecord->name = $shareholderData->name;
            $shareholderRecord->shares = $totalShares;
            $shareholderRecord->event_id =  $eventId;
            $shareholderRecord->shareholder_id =  0;
            $shareholderRecord->proxy_id = $proxyId;
            $shareholderRecord->Attendant_type = 1;
            $shareholderRecord->save();

            return redirect()->back()->with('success', 'Proxy marked succesfully.');
        }
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
