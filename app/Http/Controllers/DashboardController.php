<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $filmCount = Film::count();
        $memberCount = Member::count();
        $activeLoanCount = Loan::where('status', 'BORROWED')->count();

        return view('dashboard', compact('filmCount', 'memberCount', 'activeLoanCount'));
    }
}
