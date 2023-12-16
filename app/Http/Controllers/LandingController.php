<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LandingController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->type == '1') {
                return view('Agent.index');
            } else {
                return view('Admin.index');
            }
        } else {
            return redirect()->back();
        }
    }
    public function index()
    {
        return view('Home.index');
    }
}
