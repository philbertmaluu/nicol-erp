<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shareholder;
use App\Models\Proxy;

class LandingController extends Controller
{
    public function redirect()
    {
        $shareHolders = number_format(Shareholder::count());
        $proxy = Proxy::count();
        $totalshares = number_format(Shareholder::sum('shares'));
        $agent = User::where('type', 1)->count();

        if (Auth::id()) {
            if (Auth::user()->type == '1') {
                return view('Agent.index');
            } else {
                return view('Admin.index', compact('shareHolders', 'proxy', 'agent', 'totalshares'));
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
