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
        $incomes = Income::select('date', 'category', 'amount', 'id')->get()->toArray();

        return view('income.index', ['title' => 'My incomes', 'table' => $incomes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('income.create', ['title' => 'Add new Income', 'route' => route('incomes.create'), 'inputs' => ['category', 'date', 'amount']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validate = Validator::make($request->all(), [
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        if ($validate->fails()) {
            dump('Algo ha fallado');
        } else {
            $income = new Income;

            $income->category   = $request->category;
            $income->date       = $request->date;
            $income->amount     = $request->amount;

            $income->save();
            return redirect(route('incomes.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $income = Income::select('date', 'category', 'amount')->where('id', $id)->first()->toArray(); 


        return view('income.update', [
            'title' => 'Update an Income',
            'route' => route('incomes.update', ['id' => $id]), // para pasar id haciendo llamada a una ruta se hace de este modo route(namespace_ruta, ['clave', $valor])
            'inputs' => ['category', 'date', 'amount'],
            'income' => $income
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $income_update = $request->toArray();
      


        $validate = Validator::make($income_update, [
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        if($validate->fails()){
            dd("No has introducido  datos correctos");
        }else{
            unset($income_update['_token']);
            unset($income_update['submit']);
            $income_update = Income::where('id', $id)->update($income_update);
            return redirect(route('incomes.index'));
        }
        
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Income::where('id',$id)->delete();
        return redirect(route('incomes.index'));
    }
}
