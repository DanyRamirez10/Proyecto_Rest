<?php
function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}
function redireccionar($url)
{   
    echo '
      <script type="text/javascript">         
         function redirigir() {
            window.location = "'.$url.'";
         }
       setTimeout("redirigir()", 3000);
      </script>';
}

function redireccionar2($ur1)
{   
   header ("Location: ".$ur1."",TRUE);
}

function NumIntentos($email, $password){
   $bd = obtenerBaseDeDatos();
   $email= $_POST['email'];
   $sql = $bd->prepare("SELECT id, correo, palabra_secreta FROM usuarios WHERE correo = ?");
   $sentencia->execute([$email]);
   $registro = $sentencia->fetchObject();
   if ($registro == null) {
       # No hay registros que coincidan, y no hay a quién culpar (porque el usuario no existe)
       return 0;
   } else {
       # Sí hay registros, pero no sabemos si ya ha alcanzado el límite de intentos o si la contraseña es correcta
       $conteoIntentosFallidos = obtenerConteoIntentosFallidos($registro->id);
      if ($conteoIntentosFallidos >= MAXIMOS_INTENTOS) {
           # Ha superado el límite
           return 2;
      }
   }
}
?>