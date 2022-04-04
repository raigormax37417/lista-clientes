<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\GenericController as GenericController;
use App\Models\Candidato;
use App\Models\Votocandidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CandidatoController extends GenericController
{
  public function index()
 {
 $candidatos = Candidato::all();
 $resp = $this->sendResponse($candidatos, "Listado de candidatos");
 return ($resp);
 }
  public function store(Request $request)
 {
 $validacion = FacadesValidator::make($request->all(), [
 'nombrecompleto' => 'unique:candidato|required|max:200',
 'sexo' =>'required'
 ]);


 if ($validacion->fails())
 return $this->sendError("Error de validacion", $validacion->errors());

 $fotocandidato=""; $perfilcandidato="";

 if ($request->hasFile('foto')){
 $foto = $request->file('foto');
 $fotocandidato= $foto->getClientOriginalName();
 }
 if ($request->hasFile('perfil')){
 $perfil = $request->file('perfil');
 $perfilcandidato = $perfil->getClientOriginalName();
 }

 $campos = array(
 'nombrecompleto' => $request->nombrecompleto,
 'sexo' => $request->sexo,
 'foto' => $fotocandidato,
 'perfil' => $perfilcandidato,
 );

 if ($request->hasFile('foto')) $foto->move(public_path('image'), $fotocandidato);
 if ($request->hasFile('perfil')) $perfil->move(public_path('pdf'), $perfilcandidato);

 $candidato = Candidato::create($campos);
 $resp = $this->sendResponse($candidato,
 "Guardado...");
 return($resp);



  } //--- End store 
  public function edit($id) {
    $id = intval($id);
    $candidato = Candidato::find($id);
    return $this->send($candidato, $id);
  }

  public function send($data, $i) {
    if($data) {
      $resp = $this->sendResponse($data, "Consultado satisfactoriamente....");
    } else {
      $resp = $this->sendError("No se encontró el candidato $i");
    }
    return ($resp);

  }

  public function update(Request $request, $id)
 {
 $validacion = FacadesValidator::make($request->all(), [
 'nombrecompleto' => 'unique:candidato|required|max:200',
 'sexo' =>'required'
 ]);

 if ($validacion->fails())
 return $this->sendError("Error de validacion", $validacion->errors());

 $fotocandidato=""; $perfilcandidato="";

 if ($request->hasFile('foto')){
 $foto = $request->file('foto');
 $fotocandidato= $foto->getClientOriginalName();
 }
 if ($request->hasFile('perfil')){
 $perfil = $request->file('perfil');
 $perfilcandidato = $perfil->getClientOriginalName();
 }
    
 $campos = array(
 'nombrecompleto' => $request->nombrecompleto,
 'sexo' => $request->sexo,
 'foto' => $fotocandidato,
 'perfil' => $perfilcandidato,
 );

 if ($request->hasFile('foto')) $foto->move(public_path('image'), $fotocandidato);
 if ($request->hasFile('perfil')) $perfil->move(public_path('pdf'), $perfilcandidato);

 Candidato::whereId($id)->update($campos);
 return $this->send($campos, $id);
  }

  public function destroy($id) {
    $candidato = Candidato::find($id);
    DB::beginTransaction();
    try {
      if ($candidato) {
        Votocandidato::where('candidato_id','=',$id)->delete();
      }
      Candidato::whereId($id)->delete();
      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
    }
    return $this->send($candidato, $id);
  }
}
