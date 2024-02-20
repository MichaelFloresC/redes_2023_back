<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::all();
        return response()->json($tours);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tour=Tour::where('nombre_destino', $request['nombre_destino'])
                    ->first();

        if($tour){
            $response['status']=0;
            $response['message']='El tour ya existe';
            $response['code']=200;
        }
        else{

          // $nuevo_user[] = $request->all();
            
          $nuevo_tour['nombre_destino'] = $request['nombre_destino'];
          $nuevo_tour['foto'] = $request['foto'];
          $nuevo_tour['detalle'] = $request['detalle'];
          $nuevo_tour['id_empresa'] = 1;
         

        
          Tour::create($nuevo_tour);

            $response['status']=1;
            $response['message']='Tour registrado Exitosamente';
            $response['code']=200;
        }

        return response()->json($response);
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
