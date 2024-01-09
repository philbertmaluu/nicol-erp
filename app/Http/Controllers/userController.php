<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class userController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $users = User::all();
        $admins = User::where('type', '=', 0)->count();
        $proxies = User::where('type', '=', 1)->count();

        return view('User.index', compact('events', 'users', 'admins', 'proxies'));
    }
}
