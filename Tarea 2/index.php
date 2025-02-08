<?php
    require('library/engine.php');  
    plantilla::aplicar();  
?>

<h1>¡🌹Bienvenido al increíble mundo de Barbie👧🏼🩷🌹!</h1>
<p>¡Tú puedes ser lo que quieras ser!</p>

<div class="right">
    <a href="registers.php">Registrarse</a>
    <a href="panel.php">📈Estadísticas</a>
</div>

<table>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>👩🏼‍🏫Profesiones</th>
            <th>Detalles</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $datos = listar_registros();

        foreach ($datos as $personaje) {
            echo "<tr>
                <td><img src='{$personaje->foto}' alt='{$personaje->nombre}' width='50'></td>
                <td>{$personaje->nombre} {$personaje->apellido}</td>
                <td>{$personaje->edad()}</td>
                <td>";
            if (!empty($personaje->habilidades)) {
                foreach ($personaje->habilidades as $habilidad) {
                    echo "{$habilidad->nombre}, [Lv Xp: {$habilidad->tipo}], Sueldo: {$habilidad->nivel}<br>";
                }
            } else {
                echo "Sin habilidades";
            }

            echo "</td>
                <td><a href='registers.php?codigo={$personaje->identificacion}'>Ver detalles</a></td>
            </tr>";
        }
    ?>
    </tbody>
</table>
