<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Spending;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::select()->get()->map(function($category) {
            return[
                'id' => $category->id,
                'name' => ucfirst($category->name)
            ];
        });
        

        $tableData['heading'] = ['Name', 'Actions'];
        $tableData['data'] = $category;

        return view('category.index', ['title' => 'My Categories', 'table' => $tableData]);
    }


    public function show($id){
        $category = Category::select()->where('id',$id)->get()->map(function($category) {
            return[
                'id' => $category->id,
                'name' => ucfirst($category->name)
            ];
        });


        $incomes =  Income::with('category')->where('category_id',$id)->get()->map(function ($income) {
            return [
                'id' => $income->id,
                'category' => ucfirst($income->category->name), 
                'amount' => $income->amount,
                'date' => $income->date,
            ];
        });

        $spendings = Spending::with('category')->where('category_id',$id)->get()->map(function ($spending) {
            return [
                'id' => $spending->id,
                'category' => ucfirst($spending->category->name), 
                'price' => $spending->price,
                'amount' => $spending->amount,
                'date' => $spending->date,
            ];
        });

        ///dd($spendings);

        $tableSpending['heading'] = ['Category','Price', 'Amount', 'Date','Actions'];
        $tableSpending['data'] = $spendings;

        

        $tableData['heading'] = ['Name', 'Actions'];
        $tableData['data'] = $category;


        $tableIncome['heading'] = ['Category', 'Amount', 'Date','Actions'];
        $tableIncome['data'] = $incomes;

        return view('category.show', ['title' => 'My Categories', 'table' => $tableData, 'tableIncome' => $tableIncome, 'tableSpending' => $tableSpending]);
    }
}
