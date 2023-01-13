<!DOCTYPE html>
<html lang="en">

<?php
include("../PHP/conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do</title>
    <link rel="stylesheet" href="../CSS/scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../CSS/estilo.css">
</head>

<body>
    <div class="contenedor">
        <div class="centrado">
            <!-- Boton para eliminar todo -->
            <button id="btnVaciar" type="button" class="btnn btn-todo" title="Eliminar todos">Vaciar Lista</button>
            <!-- Boton para eliminar seleccionados -->
            <button id="btnEliminar" type="button" class="btnn btn-selec" title="Eliminar selección">-</button>
            <!-- Inicio lista de tareas -->
            <div class="list-group">
                <!-- Inicio lista dinamica -->
                <div class="left-custom-menu-adp-wrap toDo-scrollbar scrEstilo">

                    <div id="lista">
                        <?php
                        $datos = mysqli_query($con, "SELECT * FROM tareasv1");

                        while ($tupla = mysqli_fetch_array($datos)) {
                            $tarea = $tupla['IDtarea'];
                            $com = $tupla['completado'];
                            $check = '';
                            if ($com == "1") {
                                $check = 'checked';
                            }
                        ?>

                            <!-- Tarea para marcar y desmarcar -->
                            <div class="li" id="tareaMarcable<?php echo $tarea; ?>">
                                <label class="list-group-item d-flex gap-3">
                                    <!-- ALTERNATIVA PARA ONCHANGE -->
                                    <input class="form-check-input flex-shrink-0 shadow-none" type="checkbox" style="font-size: 1.375em;" onchange="marca('<?php echo $tarea; ?>','<?php echo $com; ?>');" <?php echo $check; ?>>
                                    <span class="pt-1 form-checked-content" title="<?php echo $tupla['contenido']; ?>">
                                        <strong><?php echo $tupla['contenido']; ?></strong>
                                    </span>
                                    <!-- ALTERNATIVA PARA ONCLICK -->
                                    <button type="button" class="btnn btn-mod" title="Modificar" onclick="editable(<?php echo $tarea; ?>);">+</button>
                                </label>
                            </div>

                            <!-- Opcion para actualizar -->
                            <div class="ocultar" id="tareaEditable<?php echo $tarea; ?>">
                                <label class="list-group-item d-flex gap-3">
                                    <form id="act_form">
                                        <input class="nueva" type="text" placeholder="Nueva tarea..." value="<?php echo $tupla['contenido']; ?>" maxlength="90" name="act_tarea<?php echo $tarea; ?>" id="act_tarea<?php echo $tarea; ?>" style="font-size: 17px;" autocomplete="off" required>
                                        <!-- QUITAR ESTE BOTON -->
                                        <button type="button" class="btnn btn-done" title="Modificar" onclick="actualizar('<?php echo $tarea; ?>');">+</button>
                                    </form>
                                </label>
                            </div>

                        <?php } ?>
                    </div>
                </div><!-- Fin lista dinamica -->
                <!-- Campo para ingresar nuevas tareas -->
                <label class="list-group-item d-flex gap-3 bg-light okk">
                    <form id="agregar_form">
                        <span class="pt-1 form-checked-content">
                            <input class="nueva" type="text" placeholder="Nueva tarea..." maxlength="90" name="agg_tarea" id="agg_tarea" autofocus="autofocus" autocomplete="off" required>
                        </span>
                    </form>
                </label>
            </div><!-- Fin lista de tareas -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../JS/script.js"></script>
    <script type="text/javascript" src="../JS/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../JS/scrollbar/mCustomScrollbar-active.js"></script>
</body>

</html>