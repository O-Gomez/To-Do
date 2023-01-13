<?php
    include("conn.php");

    $contenido = $_POST['agg_tarea'];
    $insertar = "INSERT INTO tareasv1 (contenido, completado, eliminado) VALUES ('$contenido', 0, 0)";

    $res = mysqli_query($con, $insertar);
    mysqli_close($con);
?>
