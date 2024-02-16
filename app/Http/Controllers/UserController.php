<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\HttpcRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $totalUsuarios = User::count();

        $user=User::where('correo', $request['correo'])
                    ->first();

        if($user){
            $response['status']=0;
            $response['message']='El usuario ya existe';
            $response['code']=200;
        }
        else{
            $user=User::create([
                'id_usuario'       =>$totalUsuarios+1,
                'nombre'           =>$request->nombre,
                'app_paterno'      =>$request->app_paterno,
                'app_materno'      =>$request->app_materno,
                'correo'           =>$request->correo,
                'nacionalidad'     =>$request->nacionalidad,
                'idioma'           =>$request->idioma,
                'id_consorcio'     =>$request->id_consorcio,
                'id_rol'           =>$request->id_rol
            ]);
            $response['status']=1;
            $response['message']='Usuario registrado Exitosamente';
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
        $id_usuario= $request->input('id_usuario');

        $camposActualizados = [
            'nombre' => $request->input('nombre'),
            'app_paterno' => $request->input('app_paterno'),
            'app_materno' => $request->input('app_materno'),
            'correo' => $request->input('correo'),
            'nacionalidad' => $request->input('nacionalidad'),
            'idioma' => $request->input('idioma'),
            'id_consorcio' => $request->input('id_consorcio'),
            'id_rol' => $request->input('id_rol')
        ];
        
        $edit_user=User::where('id_usuario', $id_usuario)->update($camposActualizados);

        if($edit_user){
            $response['status']=1;
            $response['message']='Usuario Actualizado';
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
        //
    }
}
