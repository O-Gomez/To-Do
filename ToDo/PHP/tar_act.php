<?php
    include('conn.php');

    $IDtarea = $_POST['v1'];
    $contenido = $_POST['v2'];
    $actualizar = "UPDATE tareasv1 SET contenido = '$contenido' WHERE IDtarea = $IDtarea";

    $res = mysqli_query($con,$actualizar);
    mysqli_close($con);
?>