<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elementosparte;
use DB;

class ImagenController extends Controller
{

    public function store(Request $request)
    {
        // Validar el formulario según tus necesidades
        $request->validate([
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Añade más reglas de validación según sea necesario
        ]);

        // Obtener las imágenes del formulario
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');

            foreach ($imagenes as $imagen) {
                // Generar un nombre único para cada imagen
                $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();

                // Guardar la imagen en la ruta public/img/imaPartes
                $imagen->move(public_path('/public/img/imaPartes'), $nombreImagen);

                // Almacenar el nombre de la imagen en la base de datos
                $elemento = new Elementosparte();
                $elemento->nombre_imagen = $nombreImagen;
                // Añade más campos si es necesario
                $elemento->save();
            }
        }

        // Redireccionar o devolver la respuesta que desees
        return redirect()->back()->with('success', 'Imágenes subidas y registradas correctamente');
    }
}
