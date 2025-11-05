<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;

class AcountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $data = account::select(["accounts.*", "users.name as nombre"])->join("users", "accounts.user_id","=","users.id")->get();
       $data = account::with("user")->get();
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
        $validated = $request->validate([
            'name' => 'required|string|min:2',
            'ammount' => 'required|numeric',
            'status' => 'required',
            'user_id' => 'required',
        ]);

        $data = account::create($validated);

        return response()->json([
            'status' => 'ok',
            'message' => 'Cuenta creada exitosamente',
            'data' => $data        
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $data = account::find($id);
        if ($data) {
        
            return response()->json([
                'status' => 'ok',
                'message' => 'Cuenta encontrada',
                'data' => $data        
            ]);

        }
        return response()->json([
            'status' => 'error',
            'message' => 'Cuenta no encontrada',        
        ],400);
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
            'name' => 'sometimes|required|string|min:2',
            'ammount' => 'sometimes|required|numeric',
            'status' => 'sometimes|required',
            'user_id' => 'sometimes|required',
        ]);

        $data = account::findOrFail($id);
        if ($data) {
            $data->update($validated);
        return response()->json([
            'status' => 'ok',
            'message' => 'Cuenta actualizada exitosamente',
            'data' => $data        
        ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cuenta no encontrada',        
        ],400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = account::findOrFail($id);
        if ($data) {
        $data->delete();
        }
        return response()->json([
            'status' => 'ok',
            'message' => 'Cuenta eliminada exitosamente',        
        ]);
    }

    public function ChangeStatus(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => 'required',
        ]);

        $data = account::findOrFail($id);
        if ($data) {
            $data->update($validated);
        return response()->json([
            'status' => 'ok',
            'message' => 'Estado de la cuenta actualizado exitosamente',
            'data' => $data        
        ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cuenta no encontrada',        
        ],400);
    }

}
