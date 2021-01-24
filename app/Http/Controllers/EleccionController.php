<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleccion;

use Barryvdh\DomPDF\Facade as PDF;

class EleccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elecciones = Eleccion::all();
        return view('eleccion/list', compact('elecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eleccion/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
        'periodo' => 'required|max:100',
        'fecha' => 'required',
        'fechaapertura' => 'required',
        'horaapertura' => 'required',
        'fechacierre' => 'required',
        'horacierre' => 'required',
        'observaciones' => 'required|max:100',
        ]);
        $eleccion = Eleccion::create($validacion);
        return redirect('eleccion')->with('success',
        $eleccion->periodo . ' guardado satisfactoriamente ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eleccion = Eleccion::find($id);
        return view("eleccion/edit", 
        compact('eleccion'));


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
        'periodo' => 'required|max:100',
        'fecha' => 'required',
        'fechaapertura' => 'required',
        'horaapertura' => 'required',
        'fechacierre' => 'required',
        'horacierre' => 'required',
        'observaciones' => 'required|max:100',
        ]);

        Eleccion::whereId($id)->update($validacion);
        return redirect('eleccion')
        ->with('success', ' Actualizado correctamente ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Eleccion::find($id)->delete();
        return redirect('eleccion');
    }

    public function generatepdf()
    {
        $elecciones = Eleccion::all();
        $pdf = PDF::loadView('eleccion/list', ['elecciones'=>$elecciones]);
        return $pdf->download('archivoeleccion.pdf');
        
        /*$html = "<div style='text-align:center;'><h1>PDF generado desde etiquetas html</h1>
        <br><h3>&copy;Mireya.dev</h3> </div>";
        $pdf = PDF::loadHTML($html);
        return $pdf->download('archivoeleccion.pdf');*/

        /*$elecciones = Eleccion::all();
        return PDF::loadView('eleccion/list', ['elecciones'=>$elecciones])
            ->stream('archivoeleccion.pdf');*/
    }        
}
