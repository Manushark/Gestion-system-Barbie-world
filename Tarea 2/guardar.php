<?php
require('library/engine.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $personaje = new personaje();
    $personaje->identificacion = $_POST['identificacion'] ?? '';
    $personaje->nombre = $_POST['nombre'] ?? '';
    $personaje->apellido = $_POST['apellido'] ?? '';
    $personaje->fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $personaje->foto = $_POST['foto'] ?? '';

    // Procesar habilidades si existen
    if (isset($_POST['habilidades']['nombre'])) {
        $personaje->habilidades = [];

        for ($i = 0; $i < count($_POST['habilidades']['nombre']); $i++) {
            $habilidad = new stdClass();
            $habilidad->nombre = $_POST['habilidades']['nombre'][$i];
            $habilidad->tipo = $_POST['habilidades']['tipo'][$i];
            $habilidad->nivel = $_POST['habilidades']['nivel'][$i];

            $personaje->habilidades[] = $habilidad;
        }
    }

    // Guardar datos correctamente con dos parámetros
    guardar_datos($personaje->identificacion, $personaje);

    // Redirigir a la página principal
    header("Location: index.php");
    exit;
}
?>


<h1>¡💾Personaje registrado❤️!</h1>
<p>¡El personaje ha sido registrado exitosamente!</p>

<div>
    <a href="index.php" class="boton">Volver al listado</a>
</div>