<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Validator;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aquí la lógica de negocio para el index
        $incomes = Income::select('date','category','amount')->get()->toArray();

        foreach($incomes as $income){

            $validate = Validator::make($income ,[
                'date' => 'required|date',
                'category' => 'required|string|max:255',
                'amount' => 'required|numeric|min:0',
            ]);

            if($validate->fails()){
                dd($validate->errors()->all());
            } 
        }
        return view('income.index',['title' => 'My incomes','second' => 'Spendings','enlace'=>'spending','table'=>$incomes , 'message' => 'Agregar uno nuevo' ]); 

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return '<p>Esta es la página del create de incomes</p>';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return '<p>Esta es la página del show de incomes</p>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return '<p>Esta es la página del edit de incomes</p>';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
