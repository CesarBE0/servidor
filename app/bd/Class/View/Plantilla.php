<?php

namespace Class\View;

class Plantilla
{
    /**
     * @param array $campos los nombres de los campos o atributos de la tabla
     * @param array $filas con el contenido de la tabla o array vacio si no hay datos
     * @param string $tabla el de la tabla
     * @return string un texto diciendo que no hay datos o una tabla html con el contenido de las tablas
     */
    public static function getContentTableHtml(array $campos, array $filas, string $tabla): string
    {
        if (count($filas)== 0)
            return "<h1>La tabla no tiene datos</h1>";


        $html = "<div style='margin-top: 20px; font-family: sans-serif;'>";
        $html .= "<h2 style='text-align:center'>Datos de la tabla: <i>$tabla</i></h2>";
        $html .= "<table border='1'>";

        // Cabecera (Thead)
        $html .= "<thead style='background-color: #333; color: white;'>";
        $html .= "<tr>";
        foreach ($campos as $campo) {
            $html .= "<th style='padding: 10px;'>$campo</th>";
        }
        $html .= "</tr>";
        $html .= "</thead>";

        // Cuerpo (Tbody)
        $html .= "<tbody>";
        if (empty($filas)) {
            $columnas = count($campos);
            $html .= "<tr><td colspan='$columnas' style='padding:10px; text-align:center'>No hay datos en esta tabla</td></tr>";
        } else {
            foreach ($filas as $fila) {
                $html .= "<tr>";
                // $fila es un array indexado numéricamente (por fetch_row)
                foreach ($fila as $valor) {
                    $html .= "<td style='padding: 8px;'>$valor</td>";
                }
                $html .= "</tr>";
            }
        }
        $html .= "</tbody>";
        $html .= "</table>";
        $html .= "</div>";

        return $html;
    }

}