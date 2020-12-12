<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateRangeController extends Controller
{
    public function index(Request $request)
    {
      this->validate($request,[
       'start_date' => 'required|date',
       'end_date' => 'required|date|before_or_equal:start_date',
      ]);

      $start = Carbon::parse($request->start_date);
      $end = Carbon::parse($request->end_date);

      $get_all_school = school::whereDate('date','<=',$end->format('01-30-2020'))
      ->whereDate('date','>=',$start->format('01-01-2020'));

      return view('userPage.index', compact('get_all_user'));
    }
}
