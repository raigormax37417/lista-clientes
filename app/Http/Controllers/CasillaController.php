<?php

namespace App\Http\Controllers;

use App\Models\Casilla;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CasillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //echo "Este es el contenido de laravel";
      $casillas = Casilla::all();
      return view('casilla/list', compact('casillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('casilla/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //print_r($request->all()); 
      $request->validate([
        'ubicacion' => 'required|max:100',
      ]);
    $data['ubicacion'] = $request->ubicacion;
    $casilla = Casilla::create($data);
    return redirect('casilla')->with("success",$casilla->ubicacion."guardado satisfactoriamente ...");
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
   {
      echo "Element $id"; 
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //echo "Elemento $id to Edit"; 
      $casilla = Casilla::find($id);
      return view('casilla/edit', compact('casilla'));
    }
      
    public function generatePDF() 
    {
      /*$casillas = Casilla::all();
return PDF::loadView('casilla/list', ['casillas' => $casillas])->stream('archivo.pdf'); */
      
      $html = "<div style='text-align:center;'><h1>PDF generado desde etiquetas html</h1>
        <br><h3>&copy;Raigormax</h3> </div>";
      $pdf = PDF::loadHTML($html);
      return $pdf->download('archivo.pdf');
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
    //echo "Elemento $id to Update";
      $request->validate([
        'ubicacion' => 'required|max:100',
                         ]);
      $data['ubicacion']=$request->ubicacion;
      Casilla::whereId($id)->update($data);
      return redirect('casilla')->with('success', 'Actualizando correctamente...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //  echo "Element $id is destroyed";
      Casilla::whereId($id)->delete();
      return redirect('casilla')->with("success", "Registro eliminado....");
    }
}
