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
        $shareholders = Shareholder::paginate(10);
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
            'CSD' => 'required',
            'name' => 'required',
            'shares' => 'required',
        ]);
        $shareholder = new  Shareholder;
        if ($shareholder->CSD) {
            // code to check if the csd 
            //number alresdy exist in the database
            $shareholder->CSD = $request->CSD;
        }
        $shareholder->Name = $request->name;
        $shareholder->Email = $request->email;
        $shareholder->phone = $request->phone;
        $shareholder->shares = $request->shares;
        $shareholder->save;
        return redirect()->back()->with('success', 'Shareholder created successfully.');
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
