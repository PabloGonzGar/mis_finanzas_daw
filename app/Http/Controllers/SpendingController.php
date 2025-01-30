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

        return view('spendings.index',['title' => 'My spendings','table'=>$spendings]);
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('spendings.create',['title' => 'Add spendings', 'route' => route('spending.create'), 'inputs' => ['item','date','amount', 'price']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validate = Validator::make($request->all(), [
            'date' => 'required|date',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric',
        ]);

        if ($validate->fails()) {
            dump('Algo ha fallado');
        } else {
            $spendings = new Spending;

            $spendings->item       = $request->item;
            $spendings->date       = $request->date;
            $spendings->amount     = $request->amount;
            $spendings->price      = $request->price;


            $spendings->save();
            return redirect(route('spending.index'));
        }
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
