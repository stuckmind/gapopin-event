<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $eventMendatang = Event::whereDate('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->take(5)
            ->get();
        return view('admin.dashboard.dashboard-index', [
            'title' => 'Dashboard Admin',
            'eventMendatang' => $eventMendatang
        ]);
    }
}
