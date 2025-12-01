<?php

use examen1ev\clases\Plantilla;

require "controlador.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mastermind</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <script>
        function cambia_color(numero) {
            var color = document.getElementById("combinacion" + numero).value;
            var elemento = document.getElementById("combinacion" + numero);
            elemento.className = color;
        }
    </script>
</head>
<body>
<div class="contenedorJugar">
    <div class="opciones">
        <h2>OPCIONES</h2>
        <fieldset>
            <legend>Acciones posibles</legend>
            <form action="jugar.php" method="POST">
                <input type="submit" value="<?= $mostrar_ocultar_clave?>" name="submit">
                <input type="submit" value="Resetear la Clave" name="submit">
            </form>
        </fieldset>
        <fieldset>
            <legend>Menú jugar</legend>
            <form action="jugar.php" method="POST">
                <div class="grupo_select">
                    <h3> Selecciona 4 colores para jugar</h3>
                    <?= Plantilla::genera_formulario_juego()?>
                </div>
                <input type="submit" value="Jugar" name="submit">
            </form>
        </fieldset>
    </div>

    <fieldset class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <?php
            if (!empty($informacion)) {
                echo $informacion;
            } else {
                echo "<h3>Sin datos que mostrar</h3>";
            }
            ?>
        </fieldset>
    </fieldset>
</div>
</body>
</html>