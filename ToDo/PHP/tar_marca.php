<?php
    include('conn.php');

    $IDtarea = $_POST['v1'];
    $completado = $_POST['v2'];
    $actualizar = "UPDATE tareasv1 SET completado = $completado WHERE IDtarea = $IDtarea";

    $res = mysqli_query($con,$actualizar);
    mysqli_close($con);
?>