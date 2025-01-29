<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spending;
use Illuminate\Support\Facades\Validator;


class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aquí la lógica de negocio para el index
        $spendings = Spending::select('date','item','amount','price')->get()->toArray();

        foreach($spendings as $spending){

            $validate = Validator::make($spending ,[
                'date' => 'required|date',
                'item' => 'required|string|max:255',
                'amount' => 'required|numeric|min:0',
                'price' => 'required|numeric',
            ]);

            if($validate->fails()){
                dd($validate->errors()->all());
            } 
        }

        return view('spendings.index',['title' => 'My spendings','second' => 'Incomes','enlace'=>'incomes','table'=>$spendings]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return '<p>Esta es la página del create de spendings</p>';
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
        return '<p>Esta es la página del show de spendings</p>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return '<p>Esta es la página del edit de spendings</p>';
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
