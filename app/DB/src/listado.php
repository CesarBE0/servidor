<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Database\BD;
use Dotenv\Dotenv;
use Plantilla\Plantilla;
$dotenv = Dotenv::createImmutable(__DIR__."./../");
$dotenv->load();



session_start();
$usuario = $_SESSION['usuario']?? null;
if(is_null($usuario)){
    header("Location: login.php");
    exit;
}
$tabla = $_SESSION['tabla']?? null;
$con = BD::getInstance();
$campos = $con->getFieldName($tabla);
$filas = $con->getTable($tabla);
$tabla_html = Plantilla::getTableHtml($filas, $tabla,$campos);
$header_hmtl = Plantilla::getHeader($usuario, "listado.php");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <h1><?= "$header_hmtl" ?></h1>
    <title>LISTADO DE LA TABLA <?= $tabla ?></title>

</head>
<body>

<fieldset style="background: beige; width: 700px;margin: 10%">
    <form action="listado.php" method="post">
        <?= "$tabla_html" ?><br>
        <input type="submit" name="eliminar" value="eliminar" id=""><br>
        <input type="submit" name="Editar" value="Editar" id="">
    </form>
</fieldset>
</body>
</html>
