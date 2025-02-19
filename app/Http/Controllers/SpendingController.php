<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spending;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aquí la lógica de negocio para el index
        $spendings = Spending::with('category')->get()->map(function ($spending) {
            return [
                'id' => $spending->id,
                'category' => ucfirst($spending->category->name), 
                'price' => $spending->price,
                'amount' => $spending->amount,
                'date' => $spending->date,
            ];
        });

        ///dd($spendings);

        $tableData['heading'] = ['Category','Price', 'Amount', 'Date','Actions'];
        $tableData['data'] = $spendings;



        return view('spendings.index', ['title' => 'My spendings', 'table' => $tableData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categories = Category::all();
        return view('spendings.create', ['title' => 'Add spendings', 'route' => '/spending', 'inputs' => ['category', 'date', 'amount', 'price'], 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $spendings = $request->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric|max:-1',
        ]);

        $spendings = new Spending;

        $spendings->category_id = $request->category_id;
        $spendings->date        = $request->date;
        $spendings->amount      = $request->amount;
        $spendings->price       = $request->price;



        $spendings->save();
        session()->flash('message', 'Se ha creado el Sprending exitosamente');


        return redirect(route('spending.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $spendings = Spending::with('category')->where('id',$id)->get()->map(function ($spending) {
            return [
                'id' => $spending->id,
                'category' => ucfirst($spending->category->name), 
                'price' => $spending->price,
                'amount' => $spending->amount,
                'date' => $spending->date,
            ];
        });

        ///dd($spendings);

        $tableData['heading'] = ['Category','Price', 'Amount', 'Date','Actions'];
        $tableData['data'] = $spendings;



        return view('spendings.show', ['title' => 'My spendings', 'table' => $tableData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $spendings = Spending::with('category')->where('id',$id)->get()->map(function ($spending) {
            return [
                'id' => $spending->id,
                'category' => ucfirst($spending->category->name), 
                'price' => $spending->price,
                'amount' => $spending->amount,
                'date' => $spending->date,
            ];
        })->first();
        

        $categories = Category::all();

        return view('spendings.update', [
            'title' => 'Update a Spending',
            'route' => route('spending.update', ['spending' => $id]), // para pasar id haciendo llamada a una ruta se hace de este modo route(namespace_ruta, ['clave', $valor])
            'inputs' => ['category','date', 'amount', 'price'],
            'spending' => $spendings,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $spending_update = $request->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
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
