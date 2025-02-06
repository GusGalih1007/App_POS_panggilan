<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Customers;
use App\Products;
use App\Transactions;
use App\Users;
use App\Categories;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function admindashboard()
    {
        $countproduct = Products::all()->count();
        $countcustomer = Customers::all()->count();
        $countuser = Users::all()->count();
        $counttotal = Transactions::sum('total_amount');

        //perbulan
        $transactions = Transactions::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->groupBy('month')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('month')
            ->get();

        $months = [];
        $totals = [];

        foreach ($transactions as $transaction) {
            $months[] = Carbon::create()->month($transaction->month)->format('F');
            $totals[] = $transaction->total;
        }

        //pertahun
        $transactions_year = Transactions::selectRaw('YEAR(created_at) as year, SUM(total_amount) as totalyears')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $years = [];
        $totalyear = [];

        foreach ($transactions_year as $v) {
            $years[] = $v->year;
            $totalyear[] = $v->totalyears;
        }

        return view('dashboard.admin', compact('countproduct', 'countcustomer', 'countuser', 'counttotal',
        'months', 'totals', 'years', 'totalyear'));
    }

    public function cashierdashboard()
    {
        $countproduct = Products::all()->count();
        $countcustomer = Customers::all()->count();
        $countuser = Users::all()->count();
        $counttotal = Transactions::sum('total_amount');
        $countCategories = Categories::all()->count();

        //perbulan
        $transactions = Transactions::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->groupBy('month')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('month')
            ->get();

        $months = [];
        $totals = [];

        foreach ($transactions as $transaction) {
            $months[] = Carbon::create()->month($transaction->month)->format('F');
            $totals[] = $transaction->total;
        }

        //pertahun
        $transactions_year = Transactions::selectRaw('YEAR(created_at) as year, SUM(total_amount) as totalyears')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $years = [];
        $totalyear = [];

        foreach ($transactions_year as $v) {
            $years[] = $v->year;
            $totalyear[] = $v->totalyears;
        }

        return view('dashboard.cashier', compact(
            'countproduct',
            'countcustomer',
            'countCategories',
            'countuser',
            'counttotal',
            'months',
            'totals',
            'years',
            'totalyear'
        ));
    }
}
