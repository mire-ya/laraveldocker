<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::all();
		return view('candidato/list', compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidato/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto ="";
        $perfil ="";

        $request->validate([
            'nombrecompleto' => 'required|max:200',
            'sexo' => 'required|max:1',
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'perfil' => 'required',
        ]);

        if ($request->hasFile('foto')){
           $foto = $request->foto->getClientOriginalName();
           $request->foto->move(public_path('uploads'), $foto);
        }

        if($request->hasFile('perfil')){
           $perfil = $request->perfil->getClientOriginalName();
           $request->perfil->move(public_path('uploads'), $perfil);
        }

        $data=[
        	"nombrecompleto" => $request->nombrecompleto,
        	"sexo" => $request->sexo,
        	"foto" => $foto,
        	"perfil" => $perfil
		];

        $candidato = Candidato::create($data);
        return redirect('candidato')->with('success',
        $candidato->nombrecompleto . ' Guardado Correctamente ...');
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
        $candidato = Candidato::find($id);
        return view('candidato/edit', compact('candidato'));
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
       $foto ="";
        $perfil ="";

        $request->validate([
            'nombrecompleto' => 'required|max:200',
            'sexo' => 'required|max:1',
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'perfil' => 'required',
        ]);

        if($request->hasFile('foto')){
           $foto = $request->foto->getClientOriginalName();
           $request->foto->move(public_path('uploads'), $foto);
        }

        if($request->hasFile('perfil')){
           $perfil = $request->perfil->getClientOriginalName();
           $request->perfil->move(public_path('uploads'), $perfil);
        }

        $data=[
        	"nombrecompleto" => $request->nombrecompleto,
        	"sexo" => $request->sexo,
        	"foto" => $foto,
        	"perfil" => $perfil
		];

        Candidato::find($id)->update($data);
        return redirect('candidato')->with('success',
        $data["nombrecompleto"] . ' Actulizado correctamente ...'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Candidato::find($id)->delete();
        return redirect('candidato');
    }
}
