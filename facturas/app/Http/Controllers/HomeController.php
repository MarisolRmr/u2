<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\EmpresaEmisora;
use App\Models\EmpresaReceptora;

class HomeController extends Controller
{

    public function home()
    {
        // Le pasamos toda las facturas que se tengan
        $facturas = Factura::all();
        // Le pasamos las empresas emisoras que se tengan
        $empresasEmisoras = EmpresaEmisora::all();
        // Le pasamos las empresas receptoras que se tengan
        $empresasReceptoras = EmpresaReceptora::all();

        return view('dashboard', compact('facturas', 'empresasEmisoras', 'empresasReceptoras'));
    }

    // funcion para buscar una factura
        public function buscar(Request $request){
        // Validación de campos
        $request->validate([
            'rfc_emisor' => 'required',
            'rfc_receptor' => 'required',
            'folio_factura' => 'required',
        ]);

        // Obtener los valores de los campos del formulario
        $id_emisora = $request->input('rfc_emisor');
        $id_receptora = $request->input('rfc_receptor');
        $id_folio = $request->input('folio_factura');

        // Buscar la factura en la base de datos
        $facturaEncontrada = Factura::where('empresa_emisora_id', $id_emisora)
            ->where('empresa_receptora_id', $id_receptora)
            ->where('id', $id_folio)
            ->first();

        if ($facturaEncontrada) {
            // Factura encontrada, redirigir a la vista de factura encontrada
            return redirect()->route('encontrada')->with('facturaEncontrada', $facturaEncontrada);
        } else {
            // Factura no encontrada, redirigir a la vista del formulario de búsqueda
            return redirect()->route('home')->with('error', 'Factura no encontrada');
        }
    }

    public function facturaencontrada(){
        $facturaEncontrada = session('facturaEncontrada');

        return view('encontrada', compact('facturaEncontrada'));
    }

}