function activar(data){
    switch (data){
        case 0:
            limpiar();
            $('#escuela').addClass('active treeview');
            $('#docente').addClass('active');
            $('#i_docente').addClass('text-red');
            docente();
            break;
        case 1:
            limpiar();
            $('#escuela').addClass('active treeview');
            $('#materia').addClass('active');
            $('#i_materia').addClass('text-red');
            materia();
            break;
        case 2:
            limpiar();
            $('#escuela').addClass('active treeview');
            $('#curso').addClass('active');
            $('#i_curso').addClass('text-red');
            curso();
            break;
        case 3:
            limpiar();
            $('#escuela').addClass('active treeview');
            $('#alumno').addClass('active');
            $('#i_alumno').addClass('text-red');
            alumno();
            break;
        case 4:
            limpiar();
            $('#chat1').addClass('active treeview');
            $('#chatbot1').addClass('active');
            $('#i_chatbot1').addClass('text-red');
            break;
        case 5:
            limpiar();
            $('#chat1').addClass('active treeview');
            $('#registro1').addClass('active');
            $('#i_registro1').addClass('text-red');
            break;
    }
}

function docente(){
    $.ajax({
        type: 'GET',
        url: "docentes",
        success: function (data) {
            $('#Mainbody').html(data);
        }
    });
}

function materia(){
    $.ajax({
        type: 'GET',
        url: "materias",
        success: function (data) {
            $('#Mainbody').html(data);
        }
    });
}

function curso() {
    $.ajax({
        type: 'GET',
        url: "cursos",
        success: function (data) {
            $('#Mainbody').html(data);
        }
    });
}

function alumno() {
    $.ajax({
        type: 'GET',
        url: "alumnos",
        success: function (data) {
            $('#Mainbody').html(data);
        }
    });
}

function verMaterias(url) {
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $('#Mainbody    ').html(data);
        }
    });
}

function limpiar(){
    $('#escuela').addClass('treeview');

    $('#docente').removeClass('active');
    $('#i_docente').removeClass('text-red');

    $('#materia').removeClass('active');
    $('#i_materia').removeClass('text-red');

    $('#curso').removeClass('active');
    $('#i_curso').removeClass('text-red');

    $('#alumno').removeClass('active');
    $('#i_alumno').removeClass('text-red');

    $('#chatbot1').removeClass('active');
    $('#i_chatbot1').removeClass('text-red');

    $('#registro1').removeClass('active');
    $('#i_registro1').removeClass('text-red');
}
