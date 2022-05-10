<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFController extends Controller
{
  public function generatePDF() {
    $data = [
      'title' => 'Bienvenido a Lista Clientes',
      'date' => date('m/d/Y')
    ];
    $pdf = Pdf::loadView('pdf/pdf', $data);

    return $pdf->download('archivo.pdf');
  }
}
