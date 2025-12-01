<?php

use examen1ev\clases\Clave;
use examen1ev\clases\Jugada;

$carga = fn($clase) => require(__DIR__ . "/clases/$clase.php");
spl_autoload_register($carga);

session_start();

$clave = Clave::obtener_clave();

$mostrar_ocultar_clave = "Mostrar Clave";
$informacion = "";

/**
 * @return void
 * El juego termina si he acertado 4 posiciones en la jugada actual
 * O si ya he realizado 10 jugadas
 */
function evaluar_fin_juego(Jugada $jugada)
{
    if ($jugada->get_posiciones_acertadas() == 4) {
        $win = true;
        header("location:fin.php?win=$win");
        exit;
    }
    if (sizeof($_SESSION['jugadas']) >= 10) {
        $win = false;
        header("location:fin.php?win=$win");
        exit;
    }
}

$opcion = $_POST['submit'] ?? "";

switch ($opcion) {
    case "Mostrar Clave":
        $mostrar_ocultar_clave = "Ocultar Clave";
        $informacion = Clave::get_clave();
        break;
    case "Ocultar Clave":
        $mostrar_ocultar_clave = "Mostrar Clave";
        break;
    case "Jugar":
        if (isset($_POST['combinacion'])) {
            $jugada = new Jugada($_POST['combinacion']);
            $_SESSION['jugadas'][] = serialize($jugada);
            evaluar_fin_juego($jugada);
            $informacion = Jugada::obtener_historico_jugadas();
        }
        break;
    case "Resetear la Clave":
        session_destroy();
        session_start();
        $clave = Clave::obtener_clave();
        break;
}
?>