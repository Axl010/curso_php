<?php
$servidor = "localhost";
$user="root";
$pass="Axl28433";

try {
    $conect = new PDO("mysql:host=$servidor;dbname=albumes", $user, $pass);
    $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $sql = "SELECT * FROM fotos";
        $sentencia = $conect->prepare($sql);
        $sentencia->execute();

        $fotos = $sentencia->fetchAll();
        // print_r($resultado);

        foreach ($fotos as $foto) {
            print_r($foto);
            echo "</br>";
        }
    } catch (PDOException $e) {
        echo "Error al insertar datos: " . $e->getMessage();
    }
} catch(PDOException $e) {
    echo "Conexion erronea: " . $e->getMessage();
}
?>