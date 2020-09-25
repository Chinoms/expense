<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\CategoryModel;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::paginate(20);
        return view('expenses.listexpenses', ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = CategoryModel::all();
        return view('expenses.newexpense', compact('cats'));
        // return view('expenses/newexpense');
    }


    public function reportforCategories()
    {
        $cats = CategoryModel::all();
        return view('categories.categoryreport', compact('cats'));
        // return view('expenses/newexpense');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'narration' => ["required"],
            'amount' => ["min:1", "numeric", "required"],
        ]);
        $expense = new Expense();
        $expense->narration = request('narration');
        $expense->amount = request('amount');
        $expense->category = request('category');
        $expense->save();

        return back()->with('expensesaved', 'New expenditure recorded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }

    public function expenseReport(Request $request)
    {

        $expenseDates = new Expense();
        $expenseDates->start = request('start') . " " . "00:0:00";
        $expenseDates->end = request('end') . " " . "23:59:00";
        //return $expenseDates;

        $reports = DB::table('expenses')
            ->join('categories', 'expenses.category', '=', 'categories.id')
            ->select(DB::raw('SUM(amount) as total_amount, category, categories.name'))
            ->whereBetween('expenses.created_at', [$expenseDates->start, $expenseDates->end])
            ->groupBy('category', 'categories.name')
            ->orderby('total_amount', 'DESC')
            ->get();

        return view('expenses.generatereport', ['reports' => $reports]);
    }

    public function expenseReportByCategory(Request $request)
    {
        $expenseDates = new Expense();
        $expenseDates->start = request('start') . " " . "00:0:00";
        $expenseDates->end = request('end') . " " . "23:59:00";
        $category = request('category');

        $reportsbyCategory = DB::table('expenses')
            ->where('category', '=', $category)
            ->get();
           // return $reportsbyCategory;

        return view('categories.reportbycategory', ['reportsbyCategory' => $reportsbyCategory]);
    }
}
