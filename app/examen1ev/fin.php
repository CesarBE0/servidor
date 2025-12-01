<?php

use examen1ev\clases\Clave;

$carga = fn($clase) => require("./clases/$clase.php");
spl_autoload_register($carga);

session_start();

$win = $_GET['win'] ?? false;
$clave = Clave::obtener_clave();
$jugadas = $_SESSION['jugadas'] ?? [];
$intentos = count($jugadas);

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fin del Juego</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>

<h1>RESULTADO DE TU PARTIDA</h1>

<div class="final">
    <?php if ($win): ?>
        <h2>FELICIDADES ADIVINASTE LA CLAVE en <?= $intentos ?> JUGADAS</h2>
    <?php else: ?>
        <h2>HAS AGOTADO TUS JUGADAS!!!!!</h2>
    <?php endif; ?>

    <h3>Valor de la clave:</h3>
    <div class="fila_resultados">
        <?= Clave::obtener_clave_final_html() ?>
    </div>

    <?php
    $jugadas_invertidas = array_reverse($jugadas, true);

    foreach ($jugadas_invertidas as $index => $jugada_serializada):
        $jugada = unserialize($jugada_serializada);
        $num_jugada = $index + 1;
        ?>
        <h3>Valor de la jugada <?= $num_jugada ?></h3>
        <div class="fila_resultados">
            <?= $jugada->dibujar_fila_final() ?>
        </div>

    <?php endforeach; ?>

    <div style="text-align: center; margin-top: 20px;">
        <form action="index.php">
            <button type="submit" style="font-size: 1.5em; padding: 5px 20px; font-style: oblique; border: 2px solid black; background: white; cursor: pointer;">Volver Al index</button>
        </form>
    </div>

</div>

</body>
</html>