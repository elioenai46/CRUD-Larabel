<?php

namespace App\Http\Controllers;

use App\Models\camara;
use Illuminate\Http\Request;

class CamaraController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'categoria' => 'required|string',
            'proveedor' => 'required|string',
            'tipo_de_lente' => 'required|string',
            'resolucion' => 'required|string',
            'peso' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        // Crear una nueva instancia del modelo Camara
        $camara = new camara();

        // Asignar valores a los campos del modelo
        $camara->nombre = $request->nombre;
        $camara->categoria = $request->categoria;
        $camara->proveedor = $request->proveedor;
        $camara->tipo_de_lente = $request->tipo_de_lente;
        $camara->resolucion = $request->resolucion;
        $camara->peso = $request->peso;
        $camara->precio = $request->precio;

        // Guardar la instancia en la base de datos
        $camara->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('actividades')->with('success', 'camara Registrada');
    }

    public function index()
    {
        $camaras = Camara::all(); // Recupera todos los registros de la tabla "camaras"

        return view('camaras.index', ['camaras' => $camaras]);
    }

    public function destroy($id)
    {
        $camara = Camara::find($id);

        // Verificar si la cámara existe antes de intentar eliminarla
        if ($camara) {
            $camara->delete();
            return redirect()->route('camaras.index')->with('success', 'Camara eliminada');
        } else {
            return redirect()->route('camaras.index')->with('error', 'Camara no encontrada');
        }
    }

    public function show($id)
    {
        $camara = Camara::find($id);
        return view('camaras.show   ', compact('camara'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'categoria' => 'required|string',
            'proveedor' => 'required|string',
            'tipo_de_lente' => 'required|string',
            'resolucion' => 'required|string',
            'peso' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        $camara = Camara::find($id);
        $camara->nombre = $request->nombre;
        $camara->categoria = $request->categoria;
        $camara->proveedor = $request->proveedor;
        $camara->tipo_de_lente = $request->tipo_de_lente;
        $camara->resolucion = $request->resolucion;
        $camara->peso = $request->peso;
        $camara->precio = $request->precio;

        $camara->save();

        return redirect()->route('camaras.index')->with('success', 'Camara actualizada');
    }
}
