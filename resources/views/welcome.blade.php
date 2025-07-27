<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Curso Celke</title>

    </head>
 <body>
    <h1>
        Bem Vindo , você está no curso de Laravel 12 do Celke
    </h1>
    <a href="{{ route('courses.index') }}">Listar os Cursos</a>
 </body>
</html>
