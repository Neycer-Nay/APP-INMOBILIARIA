<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasaController extends Controller
{
    public function index()
    {
        // Lógica para listar todas las casas
    }

    public function create()
    {
        return view('Admin.casas.create');  
    }

    public function store()
    {
        // Lógica para guardar una nueva casa
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
}
