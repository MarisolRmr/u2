<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Factura;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmpresaEmisora;
use App\Models\EmpresaReceptora;
use Illuminate\Support\Facades\File;


class FacturaController extends Controller{
    public function registrar_fa(User $user){

        $empresasEmisoras = EmpresaEmisora::all();
        $empresasReceptoras = EmpresaReceptora::all();

        return view('empresas.register_factura', [
            'user' => $user
        ], compact('empresasEmisoras', 'empresasReceptoras'));
    }

    public function listado(User $user){

        $facturas = Factura::all();

        return view('listado_fr', [
            'user' => $user,
            'facturas' => $facturas
        ]);
    }

    public function store(Request $request){

        //dd($request->all());

        // Validación de campos
        $request->validate([
            'empresa_emisora' => 'required',
            'empresa_receptora' => 'required',
            'folio' => 'required',
            'archivopdf' => 'required',
            'archivoxml' => 'required',
        ]);

        // Creamos la factura
        Factura::create([
            'empresa_emisora_id' => $request->empresa_emisora,
            'empresa_receptora_id' => $request->empresa_receptora,
            'folio_factura' => $request->folio,
            'archivopdf' => $request->archivopdf,
            'archivoxml' => $request->archivoxml,
        ]);

        return back()->with('mensaje', 'Factura registrada correctamente');
    }

    // Método para almacenar el archivo pdf en el servidor
    public function storepdf(Request $request){

        $archivopdf = $request->file('file');

        // Generar un nombre único para cada archivo cargado en el servidor
        $nombreArchivo = Str::uuid() . '.' . $archivopdf->getClientOriginalExtension();

        // Almacenar el archivo en la carpeta "uploads"
        $archivopdf->storeAs('uploadspdf', $nombreArchivo, 'public');

        // Obtener la ruta completa del archivo guardado
        $rutaArchivo = public_path('uploadspdf') . '/' . $nombreArchivo;
 
        return response()->json(['archivopdf' => $nombreArchivo]);

    }

    // Método para almacenar el archivo xml en el servidor
    public function storexml(Request $request){
        
        $archivoxml = $request->file('file');

        // Generar un nombre único para cada archivo cargado en el servidor
        $nombreArchivo = Str::uuid() . '.' . $archivoxml->getClientOriginalExtension();

        // Almacenar el archivo en la carpeta "uploadsxml"
        $archivoxml->storeAs('uploadsxml', $nombreArchivo, 'public');

        // Obtener la ruta completa del archivo guardado
        $rutaArchivo = public_path('uploadsxml') . '/' . $nombreArchivo;

        return response()->json(['archivoxml' => $nombreArchivo]);
    }

    public function destroy(Factura $factura)
    {
        // Eliminar el archivo pdf del servidor
        $rutaArchivo = public_path('uploadspdf') . '/' . $factura->archivopdf;
        File::delete($rutaArchivo);

        // Eliminar el archivo xml del servidor
        $rutaArchivo = public_path('uploadsxml') . '/' . $factura->archivoxml;
        File::delete($rutaArchivo);

        // Eliminar la factura de la base de datos
        $factura->delete();

        return back()->with('mensaje', 'Factura eliminada correctamente');
    }
}
