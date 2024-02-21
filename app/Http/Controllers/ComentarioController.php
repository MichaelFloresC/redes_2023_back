<?php

namespace App\Http\Controllers;
use App\Models\Comentario;

use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarios = Comentario::all();
        return response()->json($comentarios);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $comentario=Comentario::where('nombre', $request['nombre'])
                    ->first();

        if($comentario){
            $response['status']=0;
            $response['message']='El comentario ya existe';
            $response['code']=200;
        }
        else{

          // $nuevo_user[] = $request->all();
            
          $nuevo_comentario['nombre'] = $request['nombre'];
          $nuevo_comentario['correo'] = $request['correo'];
          $nuevo_comentario['comentarios'] = $request['comentarios'];
          $nuevo_comentario['calificacion'] = $request['calificacion'];
          $nuevo_comentario['id_empresa'] = 1;
         

        
          Comentario::create($nuevo_comentario);

            $response['status']=1;
            $response['message']='comentario registrado Exitosamente';
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
        $delete_comentario=Comentario::where('id_comentario', $id)->delete();

        if($delete_comentario){
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
