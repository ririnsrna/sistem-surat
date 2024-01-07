<?php

namespace App\Http\Controllers;

use App\Models\Suratkeluar;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;

class SuratgeneratePDF extends Controller
{
    public function indexKeluar($id)
    {
    

        $data = Suratkeluar::find($id);

        $pdf = FacadePdf::loadView('testPDF', compact('data'));

        return $pdf->download('Surat.pdf');
    }
}
