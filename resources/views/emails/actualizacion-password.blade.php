<!DOCTYPE html>
<html>

     <head>
        <meta charset="utf-8">
     </head>

        <body>
             <h2>Hola , {{ $email }}</h2>
             <p>
                <strong>Has cambiado de clave</strong> <br>
                 A continuación se muestran los detalles de su actualizacion de contraseña: <br>
             </p>

             <p><strong>Email: </strong> {{ $email }} </p>
             <p><strong>Clave: </strong> {{ $password }}</p>
        </body>
</html>
