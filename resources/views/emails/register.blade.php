<!DOCTYPE html>
<html>

     <head>
        <meta charset="utf-8">
     </head>

        <body>
             <h2>Hola , {{ $name }}</h2>
             <p>
                <strong>¡Nos alegra que estés aquí!</strong> <br>
                 A continuación se muestran los detalles de su cuenta: <br>
             </p>

             <p><strong>Nombre: </strong> {{ $name }} </p>
             <p><strong>Email: </strong> {{ $email }} </p>
             <p><strong>Clave: </strong> {{ $password }}</p>
        </body>
</html>
