<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Regístro de estudiantes</title>


    <link rel="icon" href="{{ asset('img/logoPrueba.png') }}" type="img/png"> 
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>


    <style>
    /* Estilo adicional para hacer el encabezado del formulario más atractivo */
    .form-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
    }
    </style>

</head>

<body>


    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-bolder">Regístro de estudiantes</h1>
            </div>
        </div>

        <div class="alert alert-success w-50 mx-auto fw-bolder text-center" id="mensajeContainer" style="display:none;">
         
        </div>

        @if(session('success'))<script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <div class="alert alert-success w-50 mx-auto fw-bolder text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            {{ session('success') }}
        </div>
        @endif


        @if(session('error'))
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
            {{ session('error') }}
        </div>
        @endif

        <div class="errorMsj"></div>

        <div class="row mt-4">
            <div class="col-md-6 offset-md-3 bg-dark p-4  border border-4 shadow rounded">
                <form action="" method="POST" id="estudiantesForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label text-white">Materia</label>
                        <select class="form-select" id="materia" name="materia" aria-label="Default select example">
                            <option disabled selected>Seleccione...</option>
                            <option value="Matematicas">Matematicas</option>
                            <option value="Español">Español</option>
                            <option value="Informatica">Informatica</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Nota</label>
                        <input type="number" class="form-control" id="nota" name="nota" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Curso</label>
                        <select class="form-select" id="curso" name="curso" aria-label="Default select example">
                            <option disabled selected>Seleccione...</option>
                            <option value="Grado 9">Grado 9</option>
                            <option value="Grado 10">Grado 10</option>
                            <option value="Grado 11">Grado 11</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="regisrar_estudiante" class="btn btn-primary w-50 ">Registrar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bolder">Listado de estudiantes registrados</h3>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre completo</th>
                                <th>Materia</th>
                                <th>Nota</th>
                                <th>Curso</th>
                                <th>Más opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mostrarDatos as $dato)
                            <tr>
                                <td>{{$dato->nombre_completo}}</td>
                                <td>{{$dato->materia}}</td>
                                <td>{{$dato->nota}}</td>
                                <td>{{$dato->curso}}</td>

                                <td class="d-flex">
                                    <form action="{{route ('est.actualizar', $dato->id)}}" method="get">
                                        <button href="" class="btn btn-primary btn-sm mx-2" id="btnEditar" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{$dato->id}}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        @csrf
                                        @method('PUT')
                                        <!-- Modal con los datos del estudiante -->
                                        <div class="modal fade mt-5" id="exampleModal{{$dato->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actulizar
                                                            datos
                                                            del estudiante</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">

                                                            <input id="idEst" type="hidden" value="{{$dato->id}}">

                                                            <label class="fw-bolder" for="">Nombre completo</label>
                                                            <input type="text" class="form-control mb-2"
                                                                value="{{$dato->nombre_completo}}"
                                                                name="nombre_completo" required>
                                                            <label class="fw-bolder" for="">Materia</label>
                                                            <select class="form-select" id="materia" name="materia"
                                                                aria-label="Default select example">
                                                                <option selected value="{{$dato->materia}}">
                                                                    {{$dato->materia}}</option>
                                                                <option value="Matematicas">Matematicas</option>
                                                                <option value="Español">Español</option>
                                                                <option value="Informatica">Informatica</option>
                                                            </select>

                                                            <label class="fw-bolder" for="">Nota</label>
                                                            <input type="number" class="form-control mb-2"
                                                                value="{{$dato->nota}}" name="nota" required>
                                                            <label class="fw-bolder">Curso</label>
                                                            <select class="form-select" id="curso" name="curso"
                                                                aria-label="Default select example">
                                                                <option value="{{$dato->curso}}">{{$dato->curso}}
                                                                </option>
                                                                <option value="Grado 9">Grado 9</option>
                                                                <option value="Grado 10">Grado 10</option>
                                                                <option value="Grado 11">Grado 11</option>
                                                            </select>


                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">Actualizar</button>

                                                    </div>
                                                </div>
                                    </form>

                </div>
            </div>


            <form action="{{route ('est.eliminar', $dato->id)}}" method="POST" id="eliminarEstudiante"
                onsubmit="return confirm('¿Seguro que quieres eliminarlo?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </form>

            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
           {!! $mostrarDatos->links() !!}
        </div>
    </div>
    </div>
    </div>

    <!-Aqui incluyo el script donde trabajo todo el jQuery->
        @include('estudiantes_js')



</body>

</html>