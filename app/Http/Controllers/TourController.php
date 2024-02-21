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
    public function update(Request $request)
    {
        $id_tour= $request->input('id_tour');

        $camposActualizados = [
            'nombre_destino' => $request->input('nombre_destino'),
            'foto' => $request->input('foto'),
            'detalle' => $request->input('detalle')    
        ];
        
        $edit_tour=Tour::where('id_tour', $id_tour)->update($camposActualizados);

        if($edit_tour){
            $response['status']=1;
            $response['message']='Tour Actualizado';
            $response['code']=200;
        }
        else{
            $response['status']=0;
            $response['message']='Datos Incorrectos';
            $response['code']=400;
        }


        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_tour=Tour::where('id_tour', $id)->delete();

        if($delete_tour){
            $response['status']=1;
            $response['message']='Tour Eliminado Satisfactoriamente';
            $response['code']=200;
        }
        else{
            $response['status']=0;
            $response['message']='Tour no Encontrado, intente nuevamente';
            $response['code']=400;
        }


        return response()->json($response);
    }
}
