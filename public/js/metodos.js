function crearDocente(){
    var form = $('#form-docente');
    var url = form.attr('action');
    $.post(url, form.serialize(), function(result){
        docente();
        $('#create_docente').modal('hide');
    }).fail(function(dato){
        var errors = dato.responseJSON;
        if ($.trim(errors)) {
            $.each(errors, function(key, value) {
                $("#create-" + key).show();
                $("#create-" + key).text(value[0]);
            });
        }
    });
}

function editarDocente(url){
    var id = $('#id').val();
    var nombres = $('.nombres').val();
    var apellidos = $('.apellidos').val();
    var celular = $('.celular').val();
    var fecha_nacimiento = $('.fecha_nacimiento').val();
    var token = $('#token').val();
    $.ajax({
        type: 'PUT',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        data: {'id':id, 'nombres': nombres, 'apellidos':apellidos, 'celular':celular, 'fecha_nacimiento':fecha_nacimiento},
        dataType: 'json',
        success: function(data){
            docente();
            $('#edit_docente').modal('hide');
        },
        error: function(error){
            var errors = error.responseJSON;
            if ($.trim(errors)){
                $.each( errors, function( key, value ) {
                    $("#edit-" + key).show();
                    $("#edit-" + key).text(value[0]);
                });
            }
        }
    });
}

function deleteDocente(url) {
    var token = $('#token').val();
    $.ajax({
        type: 'DELETE',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        dataType: 'json',
        success: function(data) {
            docente();
        }
    });
}

$('#edit_docente').on('hide.bs.modal', function (e) {
    $("#edit-nombres").hide();
    $("#edit-apellidos").hide();
    $("#edit-celular").hide();
})

$('#create_docente').on('hide.bs.modal', function (e) {
    $("#create-nombres").hide();
    $("#create-apellidos").hide();
    $("#create-celular").hide();
})

function showModalEditDocente(url){
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
    }).done(function(res){
        $('#id').val(res.id);
        $('.nombres').val(res.nombres);
        $('.apellidos').val(res.apellidos);
        $('.celular').val(res.celular);
        $('.fecha_nacimiento').val(res.fecha_nacimiento);
    });
    $('#edit_docente').modal('show');
}

function crearMateria() {
    var form = $('#form-add-materia');
    var url = form.attr('action');
    $.post(url, form.serialize(), function(result){
        materia();
    }).fail(function(dato){
        var errors = dato.responseJSON;
        if ($.trim(errors)) {
            $.each(errors, function(key, value) {
                console.log(key);
                $("#create-materia-" + key).show();
                $("#create-materia-" + key).text(value[0]);
            });
        }
    });
}

function cargarEditarMateria(id, nombre) {
    $("#materia-id").val(id);
    $("#nombre-materia").val(nombre);
    $("#nombre-materia").prop('readonly',false);
}

function editarMateria(url) {
    var token = $('#token-materia').val();
    var id = $("#materia-id").val();
    var nombre = $("#nombre-materia").val();
    url = url.replace(':id', id);
    $.ajax({
        type: 'PUT',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        data:{'nombre':nombre},
        dataType: 'json',
        success: function(data){
            materia();
        },
        error: function(error){
            var errors = error.responseJSON;
            if ($.trim(errors)){
                $.each( errors, function( key, value ) {
                    $("#edit-materia-" + key).show();
                    $("#edit-materia-" + key).text(value[0]);
                });
            }
        }
    });
}

function deleteMateria(url) {
    var token = $('#token-delete-materia').val();
    $.ajax({
        type: 'DELETE',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        dataType: 'json',
        success: function(data) {
            materia();
        }
    });
}

function crearCurso() {
    var form = $('#form-create-curso');
    var url = form.attr('action');
    $.post(url, form.serialize(), function(result){
        curso();
        $('#create_curso').modal('hide');
    }).fail(function(dato){
        var errors = dato.responseJSON;
        if ($.trim(errors)) {
            $.each(errors, function(key, value) {
                $("#create-" + key).show();
                $("#create-" + key).text(value[0]);
            });
        }
    });
}

function cargarEditarCurso(url) {
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
    }).done(function(res){
        $('#edit-id-curso').val(res.id);
        $('#nivel-edit').val(res.nivel);
        $('#capacidad-editar').val(res.capacidad);
        $('#paralelo-editar').val(res.paralelo);
    });
    $('#edit-curso').modal('show');
}

function editarCurso(url) {
    var token = $('#curso-edit-token').val();
    var id = $("#edit-id-curso").val();
    var nivel = $("#nivel-edit").val();
    var capacidad = $("#capacidad-editar").val();
    var paralelo = $("#paralelo-editar").val();
    url = url.replace(':id', id);
    $.ajax({
        type: 'PUT',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        data:{'nivel':nivel, 'capacidad':capacidad,'paralelo':paralelo},
        dataType: 'json',
        success: function(data){
            curso();
            $('#edit-curso').modal('hide');
        },
        error: function(error){
            var errors = error.responseJSON;
            if ($.trim(errors)){
                $.each( errors, function( key, value ) {
                    $("#edit-curso-" + key).show();
                    $("#edit-curso-" + key).text(value[0]);
                });
            }
        }
    });   
}

function cargarCrearMateriaCurso(id) {
    $("#agregar-curso").val(id);
    $("#agregarMateria").show();
    $("#tableMateria").hide();
}

function crearMateriaCurso(url) {
    var id = $('#agregar-curso').val();
    var materia_id = $('#agregar-materia').val();
    var persona_id = $('#agregar-persona').val();
    var token = $('#agregar-curso-token').val();
    $.ajax({
        type: 'POST',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        data: {'curso_id':id, 'meteria_id': materia_id, 'persona_id':persona_id},
        dataType: 'json',
        success: function(data){
            curso();
        },
        error: function(error){
            var errors = error.responseJSON;
            if ($.trim(errors)){
                $.each( errors, function( key, value ) {
                    $("#agregar-" + key).show();
                    $("#agregar-" + key).text(value[0]);
                });
            }
        }
    });
}

$('#crear_alumno').on('hide.bs.modal', function (e) {
    $("#crear-alumno-nombres").hide();
    $("#crear-alumno-apellidos").hide();
    $("#crear-alumno-ci").hide();
    $("#crear-alumno-celular").hide();
})

function showModalEditAlumno(url) {
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
    }).done(function(res){
        $('#edit-alumno-id').val(res.id);
        $('#edit-alumno-nombres').val(res.nombres);
        $('#edit-alumno-apellidos').val(res.apellidos);
        $('#edit-alumno-celular').val(res.celular);
        $('#edit-alumno-ci').val(res.ci);
        $('.midato').val(res.fecha_nacimiento);
    });
    $('#edit_alumno').modal('show');
}

function editarAlumno(url) {
    var id                  = $('#edit-alumno-id').val();
    var nombres             = $('#edit-alumno-nombres').val();
    var apellidos           = $('#edit-alumno-apellidos').val();
    var celular             = $('#edit-alumno-celular').val();
    var ci                  = $('#edit-alumno-ci').val();
    var fecha_nacimiento    = $('.midato').val();
    var token               = $('#edit-alumno-token').val();
    $.ajax({
        type: 'PUT',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        data: {'id':id, 'nombres': nombres, 'apellidos':apellidos, 'celular':celular, 'ci':ci,'fecha_nacimiento':fecha_nacimiento},
        dataType: 'json',
        success: function(data){
            alumno();
            $('#edit_alumno').modal('hide');
        },
        error: function(error){
            var errors = error.responseJSON;
            if ($.trim(errors)){
                $.each( errors, function( key, value ) {
                    $("#editar-alumno-" + key).show();
                    $("#editar-alumno-" + key).text(value[0]);
                });
            }
        }
    });
}

function crearAlumno() {
    var form = $('#form-alumno');
    var url = form.attr('action');
    $.post(url, form.serialize(), function(result){
        alumno();
        $('#crear_alumno').modal('hide');
    }).fail(function(dato){
        var errors = dato.responseJSON;
        if ($.trim(errors)) {
            $.each(errors, function(key, value) {
                $("#crear-alumno-" + key).show();
                $("#crear-alumno-" + key).text(value[0]);
            });
        }
    });
}

function deleteAlumnos(url) {
    var token = $('#alumno-token').val();
    $.ajax({
        type: 'DELETE',
        url: url,
        headers: {'X-CSRF-TOKEN':token},
        dataType: 'json',
        success: function(data) {
            alumno();
        }
    });
}