<?php
    require('library/engine.php');  
    plantilla::aplicar();  
    $datos = listar_registros();

    $signos = [
        'aries' => 0,
        'tauro' => 0,
        'geminis' => 0,
        'cancer' => 0,
        'leo' => 0,
        'virgo' => 0,
        'libra' => 0,
        'escorpio' => 0,
        'sagitario' => 0,
        'capricornio' => 0,
        'acuario' => 0,
        'piscis' => 0
    ];
    foreach ($datos as $personaje) {
        $signo = $personaje->signo_zodiacal();
        $signos[$signo]++;
    }

?>

<h1>📈Estadistiscas</h1>

<style>
#tablaSuperior {
   text-align: center; 
}

</style>
<table style="width: 100%" id="tablaSuperior">
<tr>
    <td>
      <h1>  <?= count($datos ) ?> Barbies👧🏼🩷 </h1>
    </td>
    <td>
    <h1> 10 </h1> 
    👩🏼‍🏫Profesiones
    </td>
    <td>
    <h1> 500  </h1>
    💰Sueldo promedio
    </td>
    <td>
    <h1> Avanzado  </h1>
    💼Experiencia promedio
    </td>
</tr>


</table>

<h2>
    🌟Signos zodiacales
</h2>
<table>

    <?php

        foreach ($signos as $signo => $cantidad) {
            echo "
            <tr>
                <td>{$signo}</td>
                <td>{$cantidad}</td>
            </tr>
            ";
        }
    ?>
</table>



<?php

$datos = listar_registros();
$labels = [];
$valores = [];


foreach ($datos as $personaje) {
    $labels[] = $personaje->nombre . ' ' . $personaje->apellido;
    $valores[] = count($personaje->habilidades ?? []);
}
?>
<h1>📊 Estadísticas de 👩🏼‍🏫Profesiones</h1>
<p>Visualización de la cantidad de profeisones por personaje.</p>

<canvas id="graficoHabilidades"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("graficoHabilidades").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: "Cantidad de habilidades",
                data: <?php echo json_encode($valores); ?>,
                backgroundColor: "rgba(255, 99, 132, 0.5)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<div class="right">
    <a href="index.php">🏠Inicio</a>
<a href="registers.php" style="button">🔖Registrarse🔖</a>
</div>
