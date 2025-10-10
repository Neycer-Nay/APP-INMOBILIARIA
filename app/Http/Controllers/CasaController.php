<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use App\Models\FotoCasa;
use Illuminate\Support\Facades\Storage;

class CasaController extends Controller
{

    public function buscar(Request $request)
    {
        $query = Casa::query();

        if ($request->filled('tipo_operacion')) {
            $query->where('tipo', $request->tipo_operacion);
        }
        if ($request->filled('tipo_inmueble')) {
            $query->where('categoria', $request->tipo_inmueble);
        }
        if ($request->filled('zona')) {
            $query->where('zona', $request->zona);
        }

        $casas = $query->with([
            'fotos' => function ($q) {
                $q->orderByDesc('foto_principal');
            }
        ])->where('estado', 'disponible')->get();

        return view('modulos.inmuebles.buscador.buscador', compact('casas'));
    }
    public function inicio()
    {

        $imagenes = [
            'recursos/img/scz2.jpg',
            'recursos/img/scz3.jpg',
            'recursos/img/scz4.jpg',
            'recursos/img/scz5.jpg',
            'recursos/img/scz6.jpg',
            'recursos/img/scz7.jpg',
        ];
        $imagenFondo = $imagenes[array_rand($imagenes)];
        $operaciones = ['venta' => 'Comprar', 'alquiler' => 'Alquilar', 'anticretico' => 'Anticrético', 'traspaso' => 'Traspaso'];
        $tiposInmueble = ['casa' => 'Casa', 'departamento' => 'Departamento', 'casa_comercial' => 'Casa Comercial', 'quinta' => 'Quinta', 'terreno' => 'Terreno'];
        $zonas = ['norte' => 'Norte', 'centro' => 'Centro', 'sur' => 'Sur', 'este' => 'Este', 'oeste' => 'Oeste'];
        return view('modulos.inicio.inicio', compact('imagenFondo', 'operaciones', 'tiposInmueble', 'zonas'));
    }
    public function index()
    {
        $casas = Casa::with([
            'fotos' => function ($q) {
                $q->orderByDesc('foto_principal');
            },
        ])->get();
        return view('Admin.casas.index', compact('casas'));
    }

    public function create()
    {
        return view('Admin.casas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|unique:casas,codigo',
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|in:venta,alquiler,anticretico,traspaso',
            'zona' => 'required|in:norte,sur,este,oeste,centro',
            'categoria' => 'required|in:casa,departamento,casa_comercial,quinta,terreno',
            'superficieTerreno' => 'required|numeric|min:0',
            'superficieConstruida' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'tiendas' => 'nullable|integer|min:0',
            'habitaciones' => 'nullable|integer|min:0',
            'banos' => 'nullable|integer|min:0',
            'garajes' => 'nullable|integer|min:0',
            'plantas' => 'nullable|integer|min:1',
            'estado' => 'nullable|in:disponible,vendido,alquilado',
            'caracteristicas' => 'nullable|string',
            'caracteristicasExternas' => 'nullable|string',
            'caracteristicasServicios' => 'nullable|string',
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif|max:8048'
        ]);

        // Procesar características (de texto a array)
        $caracteristicas = [];
        if (!empty($validatedData['caracteristicas'])) {
            $caracteristicas = array_map('trim', explode(',', $validatedData['caracteristicas']));
        }
        $caracteristicasExternas = [];
        if (!empty($validatedData['caracteristicasExternas'])) {
            $caracteristicasExternas = array_map('trim', explode(',', $validatedData['caracteristicasExternas']));
        }

        $caracteristicasServicios = [];
        if (!empty($validatedData['caracteristicasServicios'])) {
            $caracteristicasServicios = array_map('trim', explode(',', $validatedData['caracteristicasServicios']));
        }

        // Crear la casa
        $casa = Casa::create([
            'codigo' => $validatedData['codigo'],
            'titulo' => $validatedData['titulo'],
            'tipo' => $validatedData['tipo'],
            'zona' => $validatedData['zona'],
            'categoria' => $validatedData['categoria'],
            'superficieTerreno' => $validatedData['superficieTerreno'],
            'superficieConstruida' => $validatedData['superficieConstruida'],
            'precio' => $validatedData['precio'],
            'direccion' => $validatedData['direccion'],
            'ciudad' => $validatedData['ciudad'],
            'descripcion' => $validatedData['descripcion'],
            'tiendas' => $validatedData['tiendas'] ?? 0,
            'habitaciones' => $validatedData['habitaciones'] ?? 0,
            'banos' => $validatedData['banos'] ?? 0,
            'garajes' => $validatedData['garajes'] ?? 0,
            'plantas' => $validatedData['plantas'] ?? 1,
            'estado' => $validatedData['estado'] ?? 'disponible',
            'caracteristicas' => $caracteristicas,
            'caracteristicasExternas' => $caracteristicasExternas,
            'caracteristicasServicios' => $caracteristicasServicios,
        ]);

        // Guardar fotos
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $i => $foto) {
                $ruta = $foto->store('casas', 'public');
                FotoCasa::create([
                    'casa_id' => $casa->id,
                    'ruta_imagen' => $ruta,
                    'foto_principal' => $request->input('foto_principal') == $i,
                ]);
            }
        }

        return redirect()->route('casas.index')->with('success', 'Casa registrada correctamente.');

    }

    public function show($id)
    {
        $casa = Casa::with('fotos')->findOrFail($id);
        return view('modulos.inmuebles.detalle.casa-detalle', compact('casa'));
    }


    public function edit(Request $request)
    {
        // Lógica para mostrar el formulario para editar una casa
    }

    public function update(Request $request)
    {
        // Lógica para actualizar una casa
    }

    public function destroy(Request $request)
    {
        // Lógica para eliminar una casa
    }

    public function casasAlquiler()
    {
        $casas = Casa::with([
            'fotos' => function ($q) {
                $q->orderByDesc('foto_principal');
            }
        ])->where('estado', 'disponible')->where('tipo', 'alquiler')->get();
        return view('modulos.inmuebles.alquiler.casa-alquiler', compact('casas'));
    }

    public function casasVenta()
    {
        $casas = Casa::with([
            'fotos' => function ($q) {
                $q->orderByDesc('foto_principal');
            }
        ])->where('estado', 'disponible')->where('tipo', 'venta')->get();
        return view('modulos.inmuebles.venta.casa-venta', compact('casas'));
    }

    public function casasAnticretico()
    {
        $casas = Casa::with([
            'fotos' => function ($q) {
                $q->orderByDesc('foto_principal');
            }
        ])->where('estado', 'disponible')->where('tipo', 'anticretico')->get();
        return view('modulos.inmuebles.anticretico.casa-anticretico', compact('casas'));
    }


    public function casasTraspaso()
    {
        $casas = Casa::with([
            'fotos' => function ($q) {
                $q->orderByDesc('foto_principal');
            }
        ])->where('estado', 'disponible')->where('tipo', 'traspaso')->get();
        return view('modulos.inmuebles.traspaso.casa-traspaso', compact('casas'));
    }
}
