<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:lista-tratamiento|crear-tratamiento|editar-tratamiento|eliminar-tratamiento', ['only' => ['index','store']]);
         $this->middleware('permission:crear-tratamiento', ['only' => ['create','store']]);
         $this->middleware('permission:editar-tratamiento', ['only' => ['estado','store']]);
         $this->middleware('permission:eliminar-tratamiento', ['only' => ['destroy']]);
    }
    public function index()
    {
        $tratamientos=Tratamiento::all();
        return view('tratamientos.index',compact('tratamientos'));
    }
    public function estado(Tratamiento $tratamiento,Request $Request){
        $tratamiento->estado=$Request->input('estado');
        $tratamiento->save();
        return redirect('/tratamientos');
    }
    public function store(Request $Request){
        $roles=[
         'descripcion' => 'required|min:3',
         'color' => 'required|min:3',
         'costo' => 'required'
        ];
        $mensajes=[
            'descripcion.required' => 'El campo descripción es obligatorio',
            'descripcion.min' => 'El campo descripción debe tener como minimo 3 caracteres',
            'color.required' => 'El campo color es obligatorio',
            'color.min' => 'El campo color debe tener como minimo 3 caracteres',
            'costo.required' => 'El campo costo es obligatorio',
        ];
            $validator = Validator::make($Request->all(),$roles,$mensajes );

        if ($validator->passes()) {
                if ($Request->input('id')!=0) {
                    $tratamiento = Tratamiento::find($Request->input('id'));
                    $tratamiento->descripcion=$Request->input('descripcion');
                    $tratamiento->color=$Request->input('color');
                    $tratamiento->costo=$Request->input('costo');
                    $tratamiento->save();

                }else{
                    $tratamiento=new Tratamiento();
                    $tratamiento->descripcion=$Request->input('descripcion');
                    $tratamiento->color=$Request->input('color');
                    $tratamiento->costo=$Request->input('costo');
                    $tratamiento->estado='ACTIVO';
                    $tratamiento->save();
                }


        }

        return response()->json(['error'=>$validator->errors()]);
    }
    public function destroy($id){
        $esp = Tratamiento::find($id);
        $esp->delete();
    }
    public function show($id){
        return Tratamiento::find($id);
    }
}
