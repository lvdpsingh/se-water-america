<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\wa_bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
//        $service_requests = DB::table('App\Models\wa_bill')
//            ->where('customerID','=',Auth::user()->id);
        $service_requests = wa_bill::where('customerID','=',Auth::user()->id)->get();
        return view('customer.dashboard-customer', compact('service_requests'));
    }
}
