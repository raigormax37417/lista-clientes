<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mikehaertl\wkhtmlto\Pdf;

class PDFController extends Controller
{
  public function preview() {
    return view('chart/chart');
  }

  public function download() {
    $render = view('chart/chart')->render();
    try {
      $pdf = new Pdf;
      $pdf->addPage($render);
      $pdf->setOptions(['javascript-delay' => 5000]);
      $pdf->saveAs(storage_path('pdf/reporte.pdf'));
    } catch(Exception $e) {
      Log::error('No se creo el PDF: '.$pdf->getError());
    }
    return response()->download(storage_path('pdf/reporte.pdf'));
  }
}
