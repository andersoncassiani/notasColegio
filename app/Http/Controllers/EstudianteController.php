<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Estudiantes;
use Illuminate\Support\Facades\Http;

class EstudianteController extends Controller
{
    public function index()
    {
        $mostrarDatos = Estudiantes::latest()->paginate(3);
        return view('welcome', ['mostrarDatos' => $mostrarDatos]);
    }

    
    public function crear(Request $request)
    {
       $request->validate([
        'nombre_completo' => 'required',
        'materia' => 'required',
        'nota' => 'required',
        'curso' => 'required'
       ],
    ['nombre_completo.required'=>'El nombre es obligatorio.'
    ]);
     
       $estudiante = new Estudiantes();
       $estudiante->nombre_completo = $request->nombre_completo;
       $estudiante->materia = $request->materia;
       $estudiante->nota = $request->nota;
       $estudiante->curso = $request->curso;
       $estudiante->save();

      return response()->json([
        'status'=>'success'
      ]);
    }

    public function obtenerDatosDelEst($id)
    {
     $usuario = Estudiantes::find($id);
     return view('welcome', ['mostrarDatos' => $usuario]);   
    }
    
    public function actualizar(Request $request, Estudiantes $id)
{
    try {
        // Validar la solicitud, valido de que todo los campos sean requeridos para evitar registros vacios
        $request->validate([
        'nombre_completo' => 'required',
        'materia' => 'required',
        'nota' => 'required',
        'curso' => 'required'
        ]);

        // Actualizar el estudiante me diante su ID
        $id->update($request->all());

        // Redirigir a la página anterior
        return redirect()->back()->with('success', 'Los cambios han sido guardados correctamente.');
    } catch (\Exception $e) {
        // Manejar el error
        // Por ejemplo, puedes mostrar un mensaje de error al estudinate
        return redirect()->back()->with('error', 'No se pudo actualizar el estudiante.' .$e);
    }
}

    
    public function eliminar($id)
    {
        try {
            // Buscar el estudinate por ID
            $eliminar = Estudiantes::find($id);

            // Eliminar el estudiante
            $eliminar->delete();

            return redirect()->back()->with('success', 'Estudiante eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo eliminar el estudiante.' .$e);
        }
    }

    public function getApi(){
        $response = Http::get('https://randomuser.me/api/?results=5');
        $data = $response->json()['results'];
        $people = [];
        $mostUsedLetter = '';

        foreach ($data as $person) {
            $fullName = $person['name']['first'] . ' ' . $person['name']['last'];
            $people[] = [
                'name' => $fullName,
            ];
        }

        // Calcular la letra más utilizada en los nombres completos
        $letters = str_replace(' ', '', implode('', array_column($people, 'name')));

        $letterCount = array_count_values(str_split($letters));
        arsort($letterCount);
        $mostUsedLetter = key($letterCount);
        return response()->json([
            'mostUsedLetter' => $mostUsedLetter,
            'people'         => $people,
        ]);  
    }
}
