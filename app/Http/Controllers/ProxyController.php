<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proxy;
use App\Models\Shareholder;

class ProxyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $proxyIds = $attendanceReport->pluck('proxy_id')->toArray();
        // $existingProxies = Proxy::whereIn('id', $proxyIds)->get();
        $shareholders = Shareholder::all();
        $proxy_ids = Proxy::all();
        foreach ($proxy_ids  as $proxy) {
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
        $proxies = Proxy::paginate(10);

        return view('Proxy.index', compact('proxies', 'shareholderData', 'shareholders'));
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
            'name' => 'required',
            'phone' => 'required',
            'shareholders' => 'required|array',
        ]);

        // Convert the request shareholder IDs to a standard format
        $requestShareholders = json_encode(array_values($request->shareholders));

        // Fetch all existing proxies
        $existingProxies = Proxy::all();

        foreach ($existingProxies as $existingProxy) {
            // Decode the existing shareholder IDs and convert to array
            $existingShareholders = json_decode($existingProxy->shareholder_id, true);
            // Check if there is any intersection between the current request shareholders and the existing ones
            $intersection = array_intersect($existingShareholders, $request->shareholders);
            if (!empty($intersection)) {
                return redirect()->back()->with('error', 'Shareholder  already exist with another proxy.');
            }
        }
        // Create a new proxy if shareholder IDs are not found
        $proxy = new Proxy;
        $proxy->name = $request->name;
        $proxy->phone = $request->phone;
        $proxy->shareholder_id = json_encode($request->shareholders);
        $proxy->save();

        return redirect()->back()->with('success', 'Proxy created successfully.');
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
        try {
            $proxy = Proxy::findOrFail($id);
            $proxy->delete();
            return redirect()->back()->with('success', 'Proxy deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'proxy was not created successfully');
        }
    }
}
