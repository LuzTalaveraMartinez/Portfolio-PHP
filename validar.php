<?php


//      VERIFICAMOS QUE NOS VENGAS DATOS POR POST


if (isset($_POST)) {

    //CONEXION A LA BASE DE DATOS

    require_once 'conexion.php';

    //      GENERAMOS UNA SESIÓN

    if (!isset($_SESSION)) { //Cuando no existe $_SESSION la creamos y la sesion se iniciaria si no la hubieramos iniciado
        session_start();
    }


    //      RECOGEMOS LOS VALORES DEL FORMULARIO DE REGISTRO

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : false;
    $mensaje = isset($_POST['mensaje']) ? mysqli_real_escape_string($conn, $_POST['mensaje']) : false;


    //GENERAMOS UNA VARIABLE ARRAY

    $errores = array(); // Para ir guardando los errores



    //     VALIDAMOS LOS DATOS ANTES DE GUARDALOS EN LA BASE DE DATOS


    //     VALIDAMOS EL NOMBRE

    if (!empty($nombre)  && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)) {  // CHEQUEAMOS QUE NO VENGA VACIO, NI QUE SEA NÚMERICO, COMPROBAMOS QUE NO SE CUMPLE LA FUNCION REGULAR PARA CHEQUEAR QUE NO SEA NUMERO DEL 0 AL 9
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }



    //     VALIDAMOS EL EMAIL

    if (!empty($email)  && filter_var($email, FILTER_VALIDATE_EMAIL)) {  // CHEQUEAMOS QUE NO VENGA VACIO Y FILTRAMOS QUE SEA REALMENTE UN FORMATO EMAIL
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }


    //      VALIDAMOS LA MENSAJE

    if (!empty($mensaje)) {  // CHEQUEAMOS QUE NO VENGA VACIO EL MENSAJE
        $mensaje_validado = true;
    } else {
        $mensaje_validado = false;
        $errores['mensaje'] = "El mensaje está vacio";
    }



    // CREAMOS UNA VARIABLE

    $guardar_usuario = false;

    if (count($errores) == 0) {   //CUANDO LOS ERRORES SEAN IGUAL A 0 

        $guardar_usuario = true;

        // INSERTAMOS EL USUARIO EN LA BASE DE DATOS EN LA TABLA DE USUARIOS 

        $sql = "INSERT INTO contacto VALUES(null, '$nombre', '$email', '$mensaje')";
        $guardar = mysqli_query($conn, $sql);

        //var_dump(mysqli_error($conexion)); CON ESTA SENTENCIA PODER VER LOS ERRORES PRODUCIDOS Y DARLE UN STOP con die
        //die();

        if ($guardar) {
            $_SESSION['completado'] = "<h3 class='saludo'>El mensaje se ha enviado con exito</h3>";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario!";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }

    //var_dump($errores); // Van aparecer los errores  encontrados
}

// REDIRECCIONAMOS AL INDEX.PHP

header('Location: index.php');
