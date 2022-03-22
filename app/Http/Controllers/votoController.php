<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Casilla;
use App\Models\Eleccion;
use App\Models\Voto;
use App\Models\Votocandidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class votoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $votos = Voto::all();
      return view('voto/list', compact('votos'));
    }
    private function validateVote($request) {
      foreach($request->all() as $key=>$value) {
        if(substr($key,0,10) == "candidato_")
          if($value < 0){
          return false;
          } 
      }
      return true;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $candidatos = Candidato::all();
      $casillas = Casilla::all();
      $elecciones = Eleccion::all();
      return view('voto/create', compact('candidatos','casillas','elecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    if (!($this->validateVote($request))) return "Los votos no pueden ser negativos"; 

      $candidatos=[];
      foreach($request->all() as $k=>$v) {
        if(substr($k,0,10)=="candidato_")
          $candidatos[substr($k,10)]=$v;
      } 
      $data['eleccion_id'] = $request->eleccion_id;
      $data['casilla_id'] = $request->casilla_id;
      $evidenciaFileName = "";
      if($request->hasFile('evidencia')) {
        $evidenciaFileName = $request->file('evidencia')->getClientOriginalName();
      }
      if($request->hasFile('evidencia')) $request->file('evidencia')->move(public_path('pdf'), $evidenciaFileName);
    
      $data['evidencia']=$evidenciaFileName;
      $success=false;
      $message="Save successful";
      DB::beginTransaction();
      try {
        $voto = Voto::create($data);
        foreach($candidatos as $k=>$v) {
          $votocandidato=[];
          $votocandidato['voto_id'] = $voto->id;
          $votocandidato['candidato_id'] = $k;
          $votocandidato['votos'] = $v;
          Votocandidato::create($votocandidato);
        }
        DB::commit();
        $success = true;
      } catch (\Exception $e) {
        DB::rollback();
        $message = $e->getMessage();
     } 
      echo $message;
      return redirect('voto');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
