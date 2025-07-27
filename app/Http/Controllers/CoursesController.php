<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //Listar os cursos 

    public function index()
    {
      return view('courses.index');
    }
    public function create()
    {
      return view('courses.create');
    }

    public function store(Request $request)
    {
        // Aqui você pode adicionar a lógica para armazenar o curso
        // Por exemplo, salvar no banco de dados

        // Redirecionar de volta para a lista de cursos com uma mensagem de sucesso
       // return redirect()->route('courses.index')->with('success', 'Curso cadastrado com sucesso!');
       //dd($request);
       Course::create([
           'name' => $request->name,
       ]);
        return redirect()->route('courses.index')->with('success', 'Curso cadastrado com sucesso!');
    }
}
