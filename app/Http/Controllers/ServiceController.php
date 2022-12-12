<?php

namespace App\Http\Controllers;

use App\Models\wa_bill;
use Carbon\PHPStan\AbstractMacro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    /**
     * View New Request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function viewServiceRequest(Request $request)
    {
        return view('newservice.newservice-master');
    }

    /**
     * View Submitted Request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function viewServiceSubmitted(Request $request)
    {
        return view('newservice.newservice-success');
    }

    /**
     * Create a wa-bill record storing customer's billing information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function newServiceRequest(Request $request)
    {
        //validations
        $validatedData = $request->validate([
            'address_1' => 'required|max:255',

        ]);

        //action
        wa_bill::insert([
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'customerID' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        //return Redirect()->back()->with('success', 'Your request is submitted successfully.');
        return Redirect::route('newservice.success')->with('success', 'Your request is submitted successfully.');
    }
}
