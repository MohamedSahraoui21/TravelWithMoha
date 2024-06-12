<html lang="en">

<body style="background-color:rgb(241, 247, 247)">
    <h1>
        <center>Formulario de Contacto</center>
    </h1>
    <p><b>Nombre: </b>{{ $nombre }}</p>
    <p><b>Email: </b><i>{{ $email }}</i></p>
    <p><b>Tipo Usuario: </b><i>{{ $tipoUsuario }}</i></p>
    <h3>Contenido</h3>
    <blockquote>
        {{ $contenido }}
    </blockquote>

</body>

</html>
