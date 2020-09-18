<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\CategoryModel;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = CategoryModel::all();
        return view('categories.listcategories', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.newcat');
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
            'name' => ["required", "unique:categories"],
            'status' => ["required"],
        ]);

         // $category = new CategoryModel();
        // $category->name = request('name');
        // $category->status = request('status');
        // //$category->user_id = auth()->user()->id;
        // $category->save();

        return back()->with('catsaved', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $categoryModel)
    {
        //
    }

    //My own custom functions 


    public function createreport()
    {
        return view('categories.createreport');
    }


    /***
    public function generatereport(Request $request)
    {
        $expenseReport = new CategoryModel();
        $expenseReport->start = request('startdate');
        $expenseReport->end = request('enddate');
        //return $expenseReport;

        $unsortedExpenses = CategoryModel::all();
       // return $unsortedExpenses;
        $expenses = CategoryModel::groupBy('name')->paginate(20)->whereBetween('created_at', [$expenseReport->start, $expenseReport->end]);
        //return $expenses;
        return view('expenses.generatereport', ['expenses' => $expenses]);

        //$fetchReport = new 
        return view('expenses.generatereport');
    }

     **/


    public function expenseReport(Request $request)
    {
        $expenseDates = new CategoryModel();
        $expenseDates->start = request('start');
        $expenseDates->end = request('end');
        //return($expenseDates);

         $reports = DB::table('expenses')
        ->whereBetween('created_at', [$expenseDates->start, $expenseDates->end])
        ->get();
        return $reports;


      //$reports = CategoryModel::paginate(20);
            //->whereBetween('created_at', [$expenseDates->start, $expenseDates->end])
            //->groupBy('id');

            $reports = DB::table('categories')
            ->join('expenses', 'expenses.category', '=', 'categories.id')
            ->select('categories.id', 'categories.name', 'expenses.category', 'expenses.amount')
            ->get();

        return view('expenses.generatereport', ['reports' => $reports]);
        //$reports;
        //  dd();
    }
}
