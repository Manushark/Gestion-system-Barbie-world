<?php
require("library/engine.php");
plantilla::aplicar();  

$personaje = new personaje();
if (isset($_GET['codigo'])) {
    $personaje = cargar_datos($_GET['codigo']);

    if(!$personaje) {
        echo "<h1>Registro no encontrado</h1>";
        echo "<div class='right'><a href='index.php' class='boton'>Volver</a></div>";
        exit;
    }
  }



?>
<h1>Registra a tu personaje🧁🧁</h1>
<p>Por favor, ingrese los datos del nuevo personaje</p>
<div class="right">

<a href="index.php">🏠Inicio</a>
<a href="panel.php">📈Estadistiscas</a>
</div>

<form method="post" action="guardar.php" style="margin: 50px">
  <?php 
    echo my_input("identificacion", "Identificación", $personaje->identificacion, ['required' => 'required']);
    echo my_input('nombre', 'Nombre', $personaje->nombre, ['required' => 'required']);
    echo my_input('apellido', 'Apellido', $personaje->apellido, ['required' => 'required']);
    echo my_input('fecha_nacimiento', 'Fecha de nacimiento',$personaje->fecha_nacimiento, ['type' => 'date']);
    echo my_input('foto', 'Foto', $personaje->foto, ['type' => 'url']);
  ?>
  <h3>👩🏼‍🏫Profesiones</h3>
  <table>
    <thead>
      <tr>
        <th>Nombre de la profesión</th>
        <th>Nivel de experiencia </th>
        <th>Sueldo</th>
        <td>
          <button type="button" onclick="agregarHabilidad()">➕</button>
        </td>
      </tr>
    </thead>
    <tbody id="tdHabilidades">
    <?php
    
    if (!empty($personaje->habilidades) && is_array($personaje->habilidades)) {
        foreach ($personaje->habilidades as $habilidad) {
            echo "<tr>";
            echo "<td><input type='text' name='habilidades[nombre][]' value='{$habilidad->nombre}'></td>";
            echo "<td><input type='text' name='habilidades[tipo][]' value='{$habilidad->tipo}'></td>";
            echo "<td><input type='number' name='habilidades[nivel][]' value='{$habilidad->nivel}'></td>";
            echo "
            <td>
                <button onclick='quitarFila(this)'>💀</button>
            </td>
            ";
            echo "</tr>";
        }
    }
    ?>
</tbody>
  </table>
  
  <div style="margin:10px" bottom: 0px;>
     <button type="submit" Class="boton">save💾</button>
  </div>
  
</form>

<script>
function agregarHabilidad() {
    var tr = document.createElement("tr");

    var td = document.createElement("td");
    var input = document.createElement("input");
    input.type = "text";
    input.name = "habilidades[nombre][]";  
    td.appendChild(input);
    tr.appendChild(td);

    var td = document.createElement("td");
    var input = document.createElement("input");
    input.type = "text";
    input.name = "habilidades[tipo][]";  
    td.appendChild(input);
    tr.appendChild(td);

    var td = document.createElement("td");
    var input = document.createElement("input");
    input.type = "number";
    input.name = "habilidades[nivel][]"; 
    td.appendChild(input);
    tr.appendChild(td);

    var td = document.createElement("td");
    var button = document.createElement("button");
    button.innerHTML = "❎";
    button.type = "button";
    button.setAttribute("onclick", "quitarFila(this)");
    td.appendChild(button);
    tr.appendChild(td);

    document.getElementById("tdHabilidades").appendChild(tr);
}

  function quitarFila(boton) {
    if (confirm("¿Estás seguro de eliminar esta habilidad?")) {
      boton.parentElement.parentElement.remove();
    }
  boton.parentElement.parentElement.remove();
}
</script>
