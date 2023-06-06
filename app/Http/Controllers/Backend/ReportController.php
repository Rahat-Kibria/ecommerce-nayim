<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function TodayOrder(){
        $today=date('d-m-y');
        $order=DB::table('orders')->where('status',0)->where('date',$today)->get();
        return view('admin.report.today_order',compact('order'));
    }

    public function TodayDelivary(){
        $today=date('d-m-y');
        $order=DB::table('orders')->where('status',3)->where('date',$today)->get();
        return view('admin.report.today_delivary',compact('order'));
    }

    public function ThisMonth(){
        $month=date('F');
        $order=DB::table('orders')->where('status',3)->where('month',$month)->get();
        return view('admin.report.this_month',compact('order'));
    }

    public function SearchReport(){
        return view('admin.report.search_report');
    }


    public function SearchYear(Request $request){
        $year=$request->year;
        $order=DB::table('orders')->where('status',3)->where('year',$year)->get();
        $total=DB::table('orders')->where('status',3)->where('year',$year)->sum('total');

        return view('admin.report.year_search',compact('order','total'));
    }

    public function SearchMonth(Request $request){
        $month=$request->month;
        $order=DB::table('orders')->where('status',3)->where('month',$month)->get();
        $total=DB::table('orders')->where('status',3)->where('month',$month)->sum('total');
        return view('admin.report.month_search',compact('order','total'));

    }


    public function SearchDate(Request $request){
        $date=$request->date;
        $newdate=date('d-m-y',strtotime($date));
        $order=DB::table('orders')->where('status',3)->where('date',$newdate)->get();
        $total=DB::table('orders')->where('status',3)->where('date',$newdate)->sum('total');
        return view('admin.report.date_search',compact('order','total'));
    }
}
