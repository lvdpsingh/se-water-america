<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\wa_bill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(){
//        $service_requests = DB::table('wa_bills')
//            ->join('users','wa_bills.customerId','user.id')
//            ->select('wa_bills.*','user.name');
        $service_requests = wa_bill::all();
        return view('admin.dashboard-admin', compact('service_requests'));
    }

    public function editServiceRequest($id){
        $service = wa_bill::find($id);
        return view('admin.service-edit-admin',compact('service'));
    }

    public function updateServiceRequest(Request $request, $id){
        $validatedData = $request->validate([
            'move_in_date' => 'required|date|after:today',
            'address_1' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'zipcode' => 'required|numeric',
        ],
            [
                'move_in_date.after' => 'Please enter a future date.'
            ]);

        $service_update = wa_bill::find($id)->update([
            'move_in_date' => $request->move_in_date,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode
        ]);

        return Redirect()->route('dashboard-admin')->with('success','Service-Request Updated Successfully.');
    }

    public function deleteServiceRequest($id){
//        $delete = wa_bill::onlyTrashed()->find($id)->forceDelete();
        $delete = wa_bill::destroy($id);
        return Redirect()->route('dashboard-admin')->with('success','Service-Request Deleted Successfully.');
    }
}
