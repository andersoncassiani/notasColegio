<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Manejo del evento click para registrar un estudiante
        $('#regisrar_estudiante').click(function(e){
            e.preventDefault();
            let nombre_completo = $('#nombre_completo').val();
            let materia = $('#materia').val();
            let nota = $('#nota').val();
            let curso = $('#curso').val();

            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ route('est.registrar') }}",
                method: 'POST',
                data: {
                    nombre_completo: nombre_completo,
                    materia: materia,
                    nota: nota,
                    curso: curso
                },

                success: function(res){
              $('#estudiantesForm')[0].reset();
              $('.table').load(location.href+' .table');
              if(res.status=='success'){
                $('#mensajeContainer').text('¡El estudiante ha sido registrado!').show();
              }
             
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index,value){
              $('errorMsj').append('<span class="text-danger">'+value+'</span>'+'<br>');
              
                    });
                }
            });
        });

        
    });
</script>