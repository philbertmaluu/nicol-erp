<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shareholder;

class ShareholderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shareholders = Shareholder::paginate(20);
        return view('Shareholder.index', compact('shareholders'));
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
        $request->validate([
            'CSD' => 'required|unique:shareholders,CSD',
            'name' => 'required',
            'phone' => 'nullable|max:13',
            'shares' => 'required',
        ]);

        // Check if a shareholder with the given CSD already exists
        if (Shareholder::where('CSD', $request->CSD)->exists()) {
            return redirect()->back()->with('error', 'Shareholder with the provided CSD already exists.');
        }

        // Create a new Shareholder instance
        $shareholder = new Shareholder;

        // Assign values from the request
        $shareholder->CSD = $request->CSD;
        $shareholder->Name = $request->name;
        $shareholder->Email = $request->email;
        $shareholder->phone = $request->phone;
        $shareholder->shares = $request->shares;

        // Save the shareholder
        $shareholder->save();

        return redirect()->back()->with('success', 'Shareholder created successfully.');
    }


    //    // Merge shareholderData with $shareHolders
    //    $mergedShareHolders = $shareholders->toArray();
    //    //dd($shareholders);

    //    foreach ($shareholderData as $proxyId => $shareholders) {
    //        foreach ($shareholders as $shareholder) {
    //            $mergedShareHolders[] = [
    //                'proxy_id' => $proxyId,
    //                'CSD' => $shareholder['CSD'],
    //                'Name' => $shareholder['Name'],
    //                'phone' => $shareholder['phone'],
    //                'shares' => $shareholder['shares'],
    //                // Add other necessary fields from the shareholder data
    //            ];
    //        }
    //    }

    //    $AttendanceReport = Attentant::where('event_id', $eventId)->get();
    //    $total = $AttendanceReport->sum('shares');
    //    $totalShares = number_format($total);
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
        //dd($request);

        $request->validate([
            'CSD' => 'required',
            'name' => 'required',
            'phone' => 'nullable|max:13',
            'shares' => 'required'
        ]);

        try {
            // Find the shareholder with the given ID
            $shareholder = Shareholder::findOrFail($id);
            // Update the details
            $shareholder->CSD = $request->CSD;
            $shareholder->Name = $request->name;
            $shareholder->Email = $request->email;
            $shareholder->phone = $request->phone;
            $shareholder->shares = $request->shares;
            $shareholder->save();

            return redirect()->back()->with('success', 'Shareholder updated successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Shareholder not found');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $shareholder = Shareholder::findOrFail($id);
            $shareholder->delete();
            return redirect()->back()->with('success', 'Shareholder deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Shareholder not found');
        }
    }
}
