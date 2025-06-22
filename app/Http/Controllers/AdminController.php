<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Equipment;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $equipmentsCount = Equipment::count();
        $bookingsCount = Booking::count();

        return view('admin.dashboard', compact('usersCount', 'equipmentsCount', 'bookingsCount'));
    }
}
