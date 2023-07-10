<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmpresaReceptora;

class EmpresaReceptoraController extends Controller
{
    public function registrar_er(User $user)
    {
        return view('empresas.register_er', [
            'user' => $user
        ]);
    }

    //Registrar empresa receptora
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'nombre' => 'required',
            'direccion' => 'required',
            'rfc' => 'required|unique:empresa_receptora,rfc',
            'email' => 'required|email'
        ]);

        EmpresaReceptora::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'rfc' => $request->rfc,
            'email' => $request->email
        ]);

        return back()->with('mensaje', 'Empresa Receptora Registrada Correctamente');
    }

    public function listado(User $user)
    {

        $empresa_receptora = EmpresaReceptora::all();

        return view('listados.listado_er', [
            'user' => $user,
            'empresa_receptora' => $empresa_receptora
        ]);
    }

    // Eliminar empresa emisora
    public function destroy($id)
    {
        $empresa_receptora_id = EmpresaReceptora::find($id);

        $empresa_receptora_id->delete();

        return back()->with('mensaje', 'Empresa Emisora Eliminada Correctamente');
    }
}
