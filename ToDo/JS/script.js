jQuery(document).ready(function () {
    /* AGREGAR TAREAS */
    $(document).on('submit', '#agregar_form', function (e) {
        e.preventDefault();
        var inf = $('#agregar_form').serialize();
        //console.log(inf);

        $.ajax({
            url: '../PHP/tar_agg.php',
            type: 'POST',
            data: inf,

            success: function (fun) {
                $('#lista').load('../APP/index.php #lista'),
                    $('#aaaa').load('../APP/index.php #aaaa');
            }
        });
    });

    /* POR SI NO SE USA EL BOTON DE ACTUALIZAR */
    $(document).on('submit', 'div.act form#act_form', function (e) {
        e.preventDefault();
        /* ACTIVA EL BOTON PARA ENVIAR LA INFORMACION POR LA FUNCION 'actualizar' */
        $('div.act #act_form button').click();
    });
});

/* MARCAR Y DESMARCAR TAREAS */
function marca(val1, val2) {
    if (val2 == "1") {
        val2 = "0";
    } else if (val2 == "0") {
        val2 = "1";
    }
    //console.log(val1 + ' ' + val2);
    $.ajax({
        url: '../PHP/tar_marca.php',
        type: 'POST',
        data: { v1: val1, v2: val2 },

        success: function (fun) {
            $('.a' + val1).load('../APP/index.php .a' + val1);
        }
    });
};

/* HABILITAR EDICION DE TAREA */
function editable(val1) {
    var aa = document.getElementById('a' + val1);
    var bb = document.getElementById('b' + val1);

    aa.classList.toggle('ocultar');
    bb.classList.toggle('ocultar');
    bb.classList.toggle('act');
    document.getElementById('act_tarea' + val1).focus();
};

/* VACIAR LISTA */
function vaciar() {
    $.ajax({
        url: '../PHP/tar_vaciar.php',

        success: function (fun) {
            $('#lista').load('../APP/index.php #lista');
        }
    });
};

/* ACTUALIZA LA TAREA */
function actualizar(val1) {
    var val2 = document.querySelector('#act_tarea' + val1).required;
    var val2 = document.querySelector('#act_tarea' + val1).value;
    //console.log(val1 + ' ' + val2);

    $.ajax({
        url: '../PHP/tar_act.php',
        type: 'POST',
        data: { v1: val1, v2: val2 },

        success: function (fun) {
            $('#lista').load('../APP/index.php #lista');
        }
    });
};

/* ELIMINA TAREAS SELECCIONADAS/MARCADAS/COMPLETADAS */
function seleccionados() {
    $.ajax({
        url: '../PHP/tar_seleccionados.php',

        success: function (fun) {
            $('#lista').load('../APP/index.php #lista');
        }
    })
};
