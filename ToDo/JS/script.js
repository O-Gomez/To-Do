let formuInput = document.getElementById('agg_tarea');//Parte para mantener el foco en input

jQuery(document).ready(function () {
    //AGREGAR TAREAS
    $(document).on('submit', '#agregar_form', function (e) {
        e.preventDefault();
        let inf = $('#agregar_form').serialize();
        //console.log(inf);

        $.ajax({
            url: '../PHP/tar_agg.php',
            type: 'POST',
            data: inf,
            success: function () {
                $('#lista').load('index.php #lista');
                $('.toDo-scrollbar').mCustomScrollbar("scrollTo", "bottom", {
                    scrollInertia: 500
                });
                setTimeout(function () {
                    $('.toDo-scrollbar').mCustomScrollbar("scrollTo", "-=500");
                }, 550);
            }
        });
        document.getElementById('agregar_form').reset();//Para focus y limpieza
    });

    //POR SI NO SE USA EL BOTON DE ACTUALIZAR
    $(document).on('submit', 'div.act form#act_form', function (e) {
        e.preventDefault();
        //ACTIVA EL BOTON PARA ENVIAR LA INFORMACION POR LA FUNCION 'actualizar'
        $('div.act #act_form button').click();
    });
});

//HABILITAR EDICION DE TAREA
function editable(val1) {
    let aa = document.getElementById('tareaMarcable' + val1);
    let bb = document.getElementById('tareaEditable' + val1);

    aa.classList.toggle('ocultar');
    bb.classList.toggle('ocultar');
    bb.classList.toggle('act');
    document.getElementById('act_tarea' + val1).focus();
};

//ACTUALIZA LA TAREA
function actualizar(val1) {
    let val2 = document.querySelector('#act_tarea' + val1).value;
    //var val2 = document.querySelector('#act_tarea' + val1).getAttribute('name').substring(9);
    $.ajax({
        url: '../PHP/tar_act.php',
        type: 'POST',
        data: { v1: val1, v2: val2 },
        success: function () {
            $('#tareaMarcable' + val1).load('index.php #tareaMarcable' + val1),
                editable(val1);
            console.log("lal");
        }
    });
    //formuInput.focus();
};

//MARCAR Y DESMARCAR TAREAS
function marca(val1, val2) {
    if (val2 == "1") val2 = "0";
    else if (val2 == "0") val2 = "1";
    $.ajax({
        url: '../PHP/tar_marca.php',
        type: 'POST',
        data: { v1: val1, v2: val2 },
        success: function () {
            $('#tareaMarcable' + val1).load('index.php #tareaMarcable' + val1);
        }
    });
    //formuInput.focus();
};

//VACIAR LISTA
document.getElementById('btnVaciar').addEventListener('click', function () {
    $.ajax({
        url: '../PHP/tar_vaciar.php',
        success: function () {
            $('#lista').load('index.php #lista');
        }
    });
    formuInput.focus();
});

//ELIMINA TAREAS SELECCIONADAS/MARCADAS/COMPLETADAS
document.getElementById('btnEliminar').addEventListener('click', function () {
    $.ajax({
        url: '../PHP/tar_seleccionados.php',
        success: function () {
            $('#lista').load('index.php #lista');
        }
    });
    //formuInput.focus();
});
