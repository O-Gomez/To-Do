<?php
    include('conn.php');

    $sentencia = "DELETE FROM tareasv1 WHERE completado = 1";

    $res = mysqli_query($con,$sentencia);
    mysqli_close($con);
?>