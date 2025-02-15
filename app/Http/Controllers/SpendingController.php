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
        $spendings = Spending::select('date', 'item', 'amount', 'price', 'id')->get()->toArray();

        return view('spendings.index', ['title' => 'My spendings', 'table' => $spendings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('spendings.create', ['title' => 'Add spendings', 'route' => route('spending.create'), 'inputs' => ['item', 'date', 'amount', 'price']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $spendings = $request->validate([
            'date' => 'required|date',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric|max:-1',
        ]);

        $spendings = new Spending;

        $spendings->item       = $request->item;
        $spendings->date       = $request->date;
        $spendings->amount     = $request->amount;
        $spendings->price      = $request->price;

        $spendings->save();
        session()->flash('message', 'Se ha creado el Sprending exitosamente');
        return redirect(route('spending.index'));
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

        $spending = Spending::select('date', 'item', 'amount', 'price')->where('id', $id)->first()->toArray();


        return view('spendings.update', [
            'title' => 'Update a Spending',
            'route' => route('spending.update', ['spending' => $id]), // para pasar id haciendo llamada a una ruta se hace de este modo route(namespace_ruta, ['clave', $valor])
            'inputs' => ['date', 'item', 'amount', 'price'],
            'spending' => $spending
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $spending_update = $request->validate([
            'date' => 'required|date',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric|max:-1',
        ]);



        $spending_update = Spending::where('id', $id)->update($spending_update);
        session()->flash('message', 'Se ha actualizado el spending con exito');

        return redirect(route('spending.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spending_destroy = Spending::find($id);
        $spending_destroy->delete();
        return redirect(route('spending.index'));
    }
}
