<?php

namespace App\Http\Controllers;

use App\Models\Escenario;
use Illuminate\Http\Request;

class EscenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Iniciamos una consulta limpia de Eloquent
        $query = Escenario::query();

        // 2. Filtro: Buscador por Texto (Nombre del escenario)
        $query->when($request->filled('buscar'), function ($q) use ($request) {
            $q->where('nombre_escenario', 'LIKE', '%' . $request->input('buscar') . '%');
        });

        // 3. Filtro: Municipio
        $query->when($request->filled('municipio'), function ($q) use ($request) {
            $q->where('municipio', $request->input('municipio'));
        });

        // 4. Filtro: Deporte
        $query->when($request->filled('deporte'), function ($q) use ($request) {
            $q->where('deporte', $request->input('deporte'));
        });

        // 5. Filtro: Estado
        $query->when($request->filled('estado'), function ($q) use ($request) {
            $q->where('estado', $request->input('estado'));
        });

        // 6. Ejecutamos la consulta y obtenemos la COLECCIÓN de escenarios filtrados
        $escenarios = $query->get();

        $escenarioAleatorio = Escenario::inRandomOrder()->first();

        // 7. Retornamos la vista principal pasando los escenarios
        return view('escenarios', compact('escenarios', 'escenarioAleatorio'));
    }

  
    public function create()
    {
        return view('escenarios.create');
    }

    public function show($id)
    {
        $escenario = Escenario::findOrFail($id)->refresh();
        return view('escenarios.detalle', compact('escenario'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_escenario' => 'required|string|max:255',
            'descripcion'      => 'nullable|string',
            'direccion'        => 'required|string',
            'latitud'          => 'required|numeric|between:-90,90',
            'longitud'         => 'required|numeric|between:-180,180',
            'municipio'        => 'required|string',
            'deporte'          => 'required|string',
            'estado'           => 'required|string', // ASEGÚRATE DE QUE ESTÉ AQUÍ
            'horarios'         => 'nullable|string',
            'iluminacion'      => 'required|string',
            'suelo'            => 'required|string',
            'capacidad'        => 'required|integer',
            'imagen'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banos'      => 'required|string',
        ]);

        // Lógica para guardar la foto en storage/app/public/escenarios
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('escenarios', 'public');
            $data['imagen'] = $ruta;
        }

        $data['user_id'] = auth()->id(); // Asigna el usuario logueado automáticamente
        Escenario::create($data);

        return redirect()->route('escenarios.index')->with('success', 'Escenario creado.');
    }

    public function update(Request $request, $id_escenario)
    {
        // 1. Validar rigurosamente los datos que vienen del formulario
        $datosValidados = $request->validate([
            'nombre_escenario' => 'required|string|max:255',
            'descripcion'      => 'nullable|string',
            'direccion'        => 'required|string',
            'latitud'          => 'required|numeric|between:-90,90',
            'longitud'         => 'required|numeric|between:-180,180',
            'municipio'        => 'required|string',
            'deporte'          => 'required|string',
            'estado'           => 'required|string', 
            'horarios'         => 'nullable|string',
            'iluminacion'      => 'required|string',
            'suelo'            => 'required|string',
            'capacidad'        => 'required|integer',
            'banos'      => 'required|string',

        ]);

        // 2. Buscar el registro por su ID personalizado
        $escenario = Escenario::findOrFail($id_escenario);

        // 3. ACTUALIZACIÓN MASIVA UTILIZANDO EL FILLABLE del Modelo
        $escenario->update($datosValidados);

        // 4. Redireccionar de vuelta a la vista de detalle con una sesión flash de éxito
        return redirect()->route('escenarios.show', $escenario->id_escenario)
                         ->with('exito', '¡El escenario se ha actualizado correctamente!');
    }

    public function destroy($id_escenario)
    {
        // 1. Buscar el registro en la base de datos por su ID personalizado
        // Si no existe, arroja automáticamente un error 404 en vez de romper el sistema
        $escenario = Escenario::findOrFail($id_escenario);

        // 2. Opcional: Si manejas imágenes guardadas físicamente en el Storage, la borramos aquí
        // if ($escenario->imagen && \Illuminate\Support\Facades\Storage::exists('public/' . $escenario->imagen)) {
        //     \Illuminate\Support\Facades\Storage::delete('public/' . $escenario->imagen);
        // }

        // 3. Ejecutar la eliminación del registro en MySQL
        $escenario->delete();

        // 4. Redireccionar al mapa o listado de escenarios (usa el nombre correcto de tu ruta index)
        return redirect()->route('escenarios.index') 
                        ->with('exito', '¡El escenario deportivo ha sido eliminado permanentemente!');
    }

    public function mapa(Request $request)
    {
        // Iniciamos la consulta
        $query = Escenario::query();

        // Filtro por Municipio
        if ($request->filled('municipio')) {
            $query->where('municipio', $request->municipio);
        }

        // Filtro por Deporte (soporta múltiples seleccionados)
        if ($request->filled('deporte')) {
            $query->whereIn('deporte', $request->deporte);
        }

        // Obtenemos los resultados filtrados
        $escenarios = $query->get();

        return view('mapa', compact('escenarios'));
    }

    public function apiEscenarios(Request $request)
    {
        // 1. Iniciamos la consulta
        $query = Escenario::query();

        // 2. Filtro de Municipio: Si viene un valor, filtramos estrictamente
        if ($request->filled('municipio')) {
            $query->where('municipio', '=', $request->municipio);
        }

        // 3. Filtro de Deporte: Filtramos solo por los seleccionados
        if ($request->filled('deporte')) {
            $query->whereIn('deporte', (array)$request->deporte);
        }

        return response()->json($query->get());
    }
}
