<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\wa_bill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $service_requests = wa_bill::all();
        return view('admin.dashboard-admin', compact('service_requests'));
    }
}
