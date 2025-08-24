<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('home', [
            'title' => 'Event Gapopin',
            'events' => $events
        ]);
    }
}
