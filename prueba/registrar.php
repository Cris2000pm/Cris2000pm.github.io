<?php

$nombre = isset($_POST['txt_nombre']) ? $_POST['txt_nombre'] : '';
$apellidos = isset($_POST['txt_apellidos']) ? $_POST['txt_apellidos'] : '';
$correo = isset($_POST['txt_correo']) ? $_POST['txt_correo'] : '';
$numero = isset($_POST['int_numero']) ? $_POST['int_numero'] : '';
$mensaje = isset($_POST['txt_mensaje']) ? $_POST['txt_mensaje'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=prueba_db", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO usuarios(nombre, apellidos, correo, numero, mensaje) VALUES(?, ?, ?, ?, ?)');
    $pdo->bindParam(1, $nombre);
    $pdo->bindParam(2, $apellidos);
    $pdo->bindParam(3, $correo);
    $pdo->bindParam(4, $numero);
    $pdo->bindParam(5, $mensaje);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}
