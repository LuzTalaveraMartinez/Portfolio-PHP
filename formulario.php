<?php

include("./includes/cabecera.php");
include('conexion.php');

?>


<form method="post" action="validar.php">

    <div class="form-group">
        <h2 class="titulo-form">¿Queres mandarme un mensaje?</h2>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label></br>
            <input type="text" class="form-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" placeholder="Escriba su nombre" required></br>
            <div id="emailHelp" class="form-text"></div></br>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label></br>
            <input type="email" class="form-input" id="email" aria-describedby="emailHelp" name="email" placeholder="Escriba su email" required></br>
        </div>
        <div class="mb-3">
            <label for="textarea" class="form-label">Mensaje</label></br>
            <textarea type="text" class="form-textarea" id="textarea" maxlength="255" name="mensaje" rows="8" placeholder="Escriba su mensaje..."></textarea></br>
        </div></br>

        <button type="submit" class="boton btn btn-primary" name="boton-contacto" value="ENVIAR">Enviar</button>

    </div>
</form>

<body>



<?php include("./includes/pie.php");  ?>