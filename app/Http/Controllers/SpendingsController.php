<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpendingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aquí la lógica de negocio para el index
        $table = [
            'heading' =>[
                'date','item','amount','price'
            ],
            'content'=>[
                ['27/12/2005','graphic card','35','7000 €'],
                ['31/01/1997','monitor','5','500 €'],
                ['04/08/2015','keyboard','20','200 €'],
                ['04/08/2025','mouse','10','50 €'],
            ]
        ];
        return view('spendings.index',['title' => 'My spendings','second' => 'Incomes','enlace'=>'incomes','table'=>$table]);
        
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
