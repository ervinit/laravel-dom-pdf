<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Barryvdh\DomPDF\Facade\Pdf;

class DomController extends Controller
{
    public function index(Request $request) {
        $name = $request->name;
        $pdf = Pdf::loadView('pdf.invoice', array('name' => $name));
        $pdf->setPaper([0, 0, 612, 792]);
        return $pdf->download('pdfview.pdf');
    }
}
