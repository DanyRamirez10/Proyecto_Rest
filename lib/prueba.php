<?php
    include_once 'functions.php';
    $clave = "123456";
    $llave = "unamba_2023_eapiis";
    $new_clave = encrypt($clave,$llave);
    echo "la clave inicial es : ".$clave;
    echo "<br>";
    echo "La clave encriptada es : ".$new_clave;
?>