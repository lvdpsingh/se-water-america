<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\wa_bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(){
        return view('customer.dashboard-customer');
    }

    public function manageServiceRequest(){
//        $service_requests = DB::table('App\Models\wa_bill')
//            ->where('customerID','=',Auth::user()->id);
        $service_requests = wa_bill::where('customerID','=',Auth::user()->id)->get();
        return view('customer.manage-request-customer', compact('service_requests'));
    }


    public function editServiceRequest($id){
        $service = wa_bill::find($id);
        return view('customer.service-edit-customer',compact('service'));
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

        return Redirect()->route('manage-request-customer')->with('success','Service-Request Updated Successfully.');
    }

    public function deleteServiceRequest($id){
//        $delete = wa_bill::onlyTrashed()->find($id)->forceDelete();
        $delete = wa_bill::destroy($id);
        return Redirect()->route('manage-request-customer')->with('success','Service-Request Deleted Successfully.');
    }


    public function validateAddress(Request $request, $id){

        $rec = wa_bill::find($id);
        $xml = '<AddressValidateRequest USERID="556LOVED3181'.'"><Address ID="0"';
        $xml .= '><Address1'.'>'.$rec->address_1.'</Address1';
        $xml .= '><Address2'.'>'.$rec->address_2.'</Address2';
        $xml .= '><City'.'>'.$rec->city.'</City';
        $xml .= '><State'.'>'.$rec->state.'</State';
        $xml .= '><Zip5'.'>'.$rec->zipcode.'</Zip5';
        $xml .= '><Zip4'.'>'.'</Zip4';
        $xml .= '></Address'.'></AddressValidateRequest'.'>';

        $request1 = 'https://secure.shippingapis.com/ShippingAPI.dll?API=Verify&XML=';
        $request1 .= $xml;
        $request1 = urldecode($request1);
        $response = Http::post($request1);

        return Redirect::back()->with('success','Address Validated. '.strval($response));
        //return Redirect()->route('manage-request-customer')->with('success','Address-Validated Successfully.');;
    }
}
