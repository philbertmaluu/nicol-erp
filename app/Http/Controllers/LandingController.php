<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shareholder;
use App\Models\Proxy;
use App\Models\Event;

class LandingController extends Controller
{
    public function redirect()
    {
        $shareholdersDetails = Shareholder::paginate(5);
        $ProxiesDetails = Proxy::paginate(5);
        $events = Event::all();
        $shareholders = Shareholder::all();
        $shareHolders = number_format(Shareholder::count());
        $proxy = Proxy::count();
        $totalshares = number_format(Shareholder::sum('shares'));
        $agent = User::where('type', 1)->count();
        $events = Event::all();

        if (Auth::id()) {
            if (Auth::user()->type == '1') {
                return view('Events.index', compact('shareholders', 'events'));
            } else {
                return view('Admin.index', compact('shareHolders', 'proxy', 'agent', 'totalshares', 'shareholdersDetails', 'ProxiesDetails', 'events'));
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
