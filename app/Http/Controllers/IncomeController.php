<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Category;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aquí la lógica de negocio para el index
        $incomes = Income::with('category')->get()->map(function ($income) {
            return [
                'id' => $income->id,
                'category' => ucfirst($income->category->name), 
                'amount' => $income->amount,
                'date' => $income->date,
            ];
        });


        $tableData['heading'] = ['Category', 'Amount', 'Date','Actions'];
        $tableData['data'] = $incomes;


        return view('income.index', ['title' => 'My incomes', 'table' => $tableData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        
        $categories = Category::all();
        return view('income.create', ['title' => 'Add new Income', 'route' => '/incomes', 'inputs' => ['category', 'date', 'amount'], 'categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $income = $request->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0',
        ]);


        $income = new Income;

        $income->category_id    = $request->category_id;
        $income->date           = $request->date;
        $income->amount         = $request->amount;


        $income->save();

        session()->flash('message', 'Se ha creado con exito');
        return redirect(route('incomes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incomes = Income::with('category')->where('id',$id)->get()->map(function ($income) {
            return [
                'id' => $income->id,
                'category' => ucfirst($income->category->name), 
                'amount' => $income->amount,
                'date' => $income->date,
            ];
        });


        $tableData['heading'] = ['Category', 'Amount', 'Date','Actions'];
        $tableData['data'] = $incomes;


        return view('income.show', ['title' => 'My incomes', 'table' => $tableData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $income =  Income::with('category')->where('id',$id)->get()->map(function ($income) {
            return [
                'category' => ucfirst($income->category->name), 
                'amount' => $income->amount,
                'date' => $income->date,
            ];
        })->first();



        //dd($income);

        $categories = Category::all();


        return view('income.update', [
            'title' => 'Update an Income',
            'route' => route('incomes.update', ['income' => $id]), // para pasar id haciendo llamada a una ruta se hace de este modo route(namespace_ruta, ['clave', $valor])
            'inputs' => ['category', 'date', 'amount'],
            'categories'=> $categories,
            'income' => $income
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $income_update = $request->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0',
        ]);


        $income_update = Income::where('id', $id)->update($income_update);


        session()->flash('message', 'Se ha actualizado el income con exito');

        return redirect(route('incomes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $income_destroy =  Income::find($id);
        $income_destroy->delete();

        return redirect(route('incomes.index'));
    }
}
