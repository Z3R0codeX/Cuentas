<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = transaction::with("user","account","category")->get();
        return response()->json([
            'status' => 'ok',
            'data' => $data        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'ammount' => 'required|numeric',
            'type' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'user_id' => 'required',
            'account_id' => 'required',
            'category_id' => 'required',
        ]);
        $data = transaction::create($validate);

        return response()->json([
            'status' => 'ok',  
            'message' => 'Transacción creada exitosamente',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = transaction::find($id);
        if ($data) {
            return response()->json([
                'status' => 'ok',
                'data' => $data        
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Transacción no encontrada'        
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'ammount' => 'required|numeric',
            'type' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'user_id' => 'required',
            'account_id' => 'required',
            'category_id' => 'required',
        ]);

        $data = transaction::findOrFail($id);
        $data->update($validated);

        return response()->json([
            'status' => 'ok',  
            'message' => 'Transacción actualizada exitosamente',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = transaction::findOrFail($id);
        if ($data) {
        $data->delete();
        }
          return response()->json([
            'status' => 'ok',  
            'message' => 'Transacción eliminada exitosamente',
        ]);
    }
}
