<div class="modal fade mt-5" id="exampleModal{{$dato->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    
        <form action="" method="POST" id="actualizarForm">
            @csrf
            @method('')
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actulizar datos
                    del estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">

                <input type="hidden" id="id">

                    <label class="fw-bolder" for="">Nombre completo</label>
                    <input type="text" class="form-control mb-2" value="{{$dato->nombre_completo}}"
                        name="nombre_completo" id="nombre_completo" required>
                    <label class="fw-bolder" for="">Materia</label>
                    <select class="form-select" id="materia" name="materia" aria-label="Default select example">
                        <option selected value="{{$dato->materia}}">
                            {{$dato->materia}}</option>
                        <option value="Matematicas">Matematicas</option>
                        <option value="Español">Español</option>
                        <option value="Informatica">Informatica</option>
                    </select>

                    <label class="fw-bolder" for="">Nota</label>
                    <input type="number" class="form-control mb-2" value="{{$dato->nota}}" name="nota"  id="nota" required>
                    <label class="fw-bolder">Curso</label>
                    <select class="form-select" id="curso" name="curso" aria-label="Default select example">
                        <option value="{{$dato->curso}}">{{$dato->curso}}
                        </option>
                        <option value="Grado 9">Grado 9</option>
                        <option value="Grado 10">Grado 10</option>
                        <option value="Grado 11">Grado 11</option>
                    </select>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="actualizarEstudiante">Actualizar</button>

            </div>
        </div>

        </form>

    </div>
</div>