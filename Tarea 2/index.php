<?php
    require('library/engine.php');  
    plantilla::aplicar();  
?>

        <h1>¡🌹Bienvenido al increible mundo de Barbie👧🏼🩷🌹!</h1>
        <p>¡Tu puedes ser lo que quieras ser!</p>
        
    </div>

    <div class="right">
        <a href="registers.php">Registrarse</a>
        <a href="panel.php">📈Estadistiscas</a>
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

            foreach ($datos as $personaje){
                echo"
                <tr>
                    <td><img src='{$personaje->foto}' alt='{$personaje->nombre}' width='50'></td>
                    <td>{$personaje->nombre} {$personaje->apellido}</td>
                    <td>{$personaje->edad()}</td>
                    <td>{$personaje->mostrar()}</td>
                    <td><a href='registers.php?codigo={$personaje->identificacion}'>Ve detalles</a></td>
                </tr>
                ";
            }
        ?>
        </tbody>
    </table>
