<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    // activity logs page for admins
    public function activtyLogs()
    {
        $activity_logs = Activity::orderBy('created_at','DESC')->get();
        return view('dashboard.logs.activity_logs')->with('activity_logs', $activity_logs);
    }
}
