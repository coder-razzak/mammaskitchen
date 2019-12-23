<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationContrimed;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();

        Notification::route('mail', $reservation->email)
            ->notify(new ReservationContrimed($reservation));

        return back()->with('successMsg', 'Reservation Successfully Ssaved !');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return back()->with('successMsg', 'Reservation Deleted Successfully !!');
    }
}
