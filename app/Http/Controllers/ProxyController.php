<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proxy;

class ProxyController extends Controller
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
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'shareholders' => 'required|array',
        ]);

        // dd($request);
        $proxy = new Proxy;
        $proxy->name = $request->name;
        $proxy->phone = $request->phone;
        $proxy->shareholder_id = json_encode($request->shareholders);
        $proxy->save();
        return redirect()->back()->with('success', 'proxy created sucessfully.');
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
