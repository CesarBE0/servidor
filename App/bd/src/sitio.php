<?php
// cargo el autoload
require './../vendor/autoload.php';

use Class\DataBase\BaseDatos;
use Class\View\Plantilla;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();


$con = BaseDatos::getInstance();
$tablas = $con->getAllTables();
$tabla_html = "";

if (isset($_POST['submit'])){
    $tabla = $_POST['submit'];

    if(in_array($tabla, $tablas)){
        $campos = $con->getFieldName($tabla);
        $filas = $con->getContentTable($tabla);
        $tabla_html = Plantilla::getContentTableHtml($campos, $filas, $tabla);
    } else {
        $tabla_html = "<p style='color:red'>Error: La tabla no existe.</p>";
    }
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset style="background: antiquewhite;width:70%;margin:10%">
    <legend>Tablas</legend>
    <form action="index.php" method="POST">
        <?php
        foreach ($tablas as $tabla) {
            echo "<input type='submit' name='submit' value='$tabla'>";
        }
        ?>
    </form>
</fieldset>
<?php
if (!empty($tabla_html)) {
    echo $tabla_html;
}
?>
</body>
</html>