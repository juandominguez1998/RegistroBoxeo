<?php

namespace App\Http\Controllers;

use App\Models\Boxeadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BoxeadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $datos['boxeadores']=Boxeadores::paginate();
    
        return view ('boxeadores.index',$datos);
      
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('boxeadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $campos=[
            'Nombre'=>'required|string|max:100',
            'Edad'=>'required|string|max:10',
            'Peso'=>'required|string|max:10',
            'Categoria'=>'required|string|max:100',
            'Estado'=>'required|string|max:100',
            'Municipio'=>'required|string|max:100',
            'Club'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
         ];
     $mensaje=[
        'required'=>'El :attribute es requerido',
        'Foto.required'=>'La foto requerida'
     ];

  $this->validate($request,$campos,$mensaje);

       // $datosBoxeador=request()->all();
       $datosBoxeadores=request()->except('_token');
       if ($request->hasFile('Foto')){
         $datosBoxeadores['Foto']=$request->file('Foto')->store('uploads','public');

       }
       Boxeadores::insert($datosBoxeadores);
      return redirect('boxeadores')->with('mensaje', 'Boxeador agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boxeadores  $boxeadores
     * @return \Illuminate\Http\Response
     */
    public function show(Boxeadores $boxeadores)
    {
        //
        $datos['boxeadores']=Boxeadores::paginate();
        return view ('boxeadores.show',$datos);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boxeadores  $boxeadores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $boxeador=Boxeadores::findOrFail($id);
        return view ('boxeadores.edit', compact('boxeador'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boxeadores  $boxeadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Edad'=>'required|string|max:10',
            'Peso'=>'required|string|max:10',
            'Categoria'=>'required|string|max:100',
            'Estado'=>'required|string|max:100',
            'Municipio'=>'required|string|max:100',
            'Club'=>'required|string|max:100',
            
         ];
     $mensaje=[
        'required'=>'El :attribute es requerido',
        
     ];
     if ($request->hasFile('Foto')){
      $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
      $mensaje=['Foto.required'=>'La foto requerida' ];
     }

  $this->validate($request,$campos,$mensaje);



        //
        $datosBoxeadores=request()->except(['_token','_method']);

        if ($request->hasFile('Foto')){
            $boxeador=Boxeadores::findOrFail($id);
            Storage::delete('public/'.$boxeador->Foto);
            $datosBoxeadores['Foto']=$request->file('Foto')->store('uploads','public');
   
          }

        Boxeadores::where('id','=',$id)->update($datosBoxeadores);

        $boxeador=Boxeadores::findOrFail($id);
        //return view ('boxeadores.edit', compact('boxeador'));
        return redirect('boxeadores')->with('mensaje', 'Boxeador Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boxeadores  $boxeadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $boxeador=Boxeadores::findOrFail($id);
        if(Storage::delete('public/'.$boxeador->Foto)){
            Boxeadores::destroy($id);
        }
        
        return redirect('boxeadores')->with('mensaje', 'Boxeador Eliminado con exito');
    }
    
}
