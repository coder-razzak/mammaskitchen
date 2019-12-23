<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'phone'  => 'required',
            'email'  => 'required',
            'date_and_time'  => 'required'
        ]);
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->data_and_time = $request->date_and_time;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        Toastr::success('Reservation request sent successfully. We will confirm to you shortly.','Success');
        return back();
    }
}



















