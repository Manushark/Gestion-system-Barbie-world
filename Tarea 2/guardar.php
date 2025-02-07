<?php
require("library/engine.php");
$personaje = new personaje();
$personaje->identificacion = $_POST['identificacion'];
$personaje->nombre = $_POST['nombre'];
$personaje->apellido = $_POST['apellido'];
$personaje->fecha_nacimiento = $_POST['fecha_nacimiento'];
$personaje->foto = $_POST['foto'];
$personaje->habilidades =$_POST ['habilidades'];

if (!empty($_POST['habilidades']['nombre']) && is_array($_POST['habilidades']['nombre'])) {
    foreach ($_POST['habilidades']['nombre'] as $i => $nombre) {
        $habilidad = new habilidades();
        $habilidad->nombre = $nombre;
        $habilidad->tipo = $_POST['habilidades']['tipo'][$i] ?? '';
        $habilidad->nivel = $_POST['habilidades']['nivel'][$i] ?? 0;
        $personaje->habilidades[] = $habilidad;
    }
    $personaje->habilidades = $habilidades;

    // Guardar datos
    guardar_datos($personaje);

    header("Location: index.php");
    exit();
} else {
    echo "⚠️ No se recibieron habilidades.";
} else {
    echo "⚠️ No se recibieron habilidades.";
}


guardar_datos($personaje -> identificacion, $personaje);
plantilla::aplicar();  
?>

<h1>¡💾Personaje registrado❤️!</h1>
<p>¡El personaje ha sido registrado exitosamente!</p>

<div>
    <a href="index.php" class="boton">Volver al listado</a>
</div>