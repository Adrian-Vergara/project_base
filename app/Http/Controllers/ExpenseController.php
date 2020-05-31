<?php

namespace App\Http\Controllers;

use App\Entities\Response;
use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $response = new Response();
        $expenses = Expense::with('type')->get();
        if(count($expenses) > 0){
            $response->success = true;
            $response->content = $expenses;
        }
        else{
            $response->success = false;
            $response->message = "No se encuentran gastos almacenados.";
        }
        return response()->json($response);
    }


    public function store(Request $request)
    {
        $response = new Response();
        $data = $request->all();
        $expense = new Expense($data);
        if($expense->save()){
            $response->success = true;
            $response->message = "Datos almacenados exitosamente.";
            $response->content = $expense;
        }
        else{
            $response->success = false;
            $response->message = "No se almacenó la información, por favor intente nuevamente.";
        }
        return response()->json($response);
    }

    public function show($id)
    {
        $response = new Response();
        $expense = Expense::with('type')
            ->where('id', $id)
            ->first();
        if(!empty($expense)){
            $response->success = true;
            $response->content = $expense;
        }
        else{
            $response->success = false;
            $response->message = "El gasto que desea consultar no existe, por favor intente nuevamente.";
        }
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $response = new Response();
        $data = $request->all();
        $expense = Expense::find($id);
        if(!empty($expense)){
            $expense->fill($data);
            if($expense->save()){
                $response->success = true;
                $response->message = "Datos actualizados exitosamente.";
                $response->content = $expense;
            }
            else{
                $response->success = false;
                $response->message = "No se pudo actualizar la información del gasto, por favor intente nuevamente.";
            }
        }
        else{
            $response->success = false;
            $response->message = "El gasto que desea actualizar no existe.";
        }
        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = new Response();
        $expense = Expense::find($id);
        if(!empty($expense)){
            if($expense->delete()){
                $response->success = true;
                $response->message = "Datos eliminados exitosamente.";
                $response->content = $expense;
            }
            else{
                $response->success = false;
                $response->message = "No se pudo eliminar la información del gasto, por favor intente nuevamente.";
            }
        }
        else{
            $response->success = false;
            $response->message = "El gasto que desea eliminar no existe.";
        }
        return response()->json($response);
    }
}
