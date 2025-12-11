<?php
/**
 * Biblioteca de utilidades matemáticas.
 *
 * Clase desarrollada como parte de la práctica de documentación.
 * Contiene métodos estáticos para operaciones aritméticas.
 *
 * @package    Cesar\Utils
 * @author     Cesar <cesar@gmail.com>
 * @copyright  2025
 * @version
 * @link       https://github.com/
 */

namespace App\Utils;

/**
 * Clase Matematicas.
 *
 * Agrupa funciones matemáticas de uso general.
 * No se debe instanciar, uso estático.
 */
class Matematicas
{
    /**
     * @var float PI Valor de la constante PI con 4 decimales.
     */
    const PI = 3.1416;

    /**
     * Realiza la suma de dos números.
     *
     * @param float $a El primer sumando.
     * @param float $b El segundo sumando.
     * @return float El resultado de la suma.
     */
    public static function sumar(float $a, float $b): float
    {
        return $a + $b;
    }

    /**
     * Realiza una división controlada.
     *
     * @param float $dividendo Número a dividir.
     * @param float $divisor Número por el que se divide.
     * @return float Resultado de la división.
     * @throws \Exception Si el divisor es 0.
     * @example Matematicas::dividir(10, 2); // Devuelve 5
     */
    public static function dividir(float $dividendo, float $divisor): float
    {
        if ($divisor == 0) {
            throw new \Exception("Error: No se puede dividir por cero.");
        }
        return $dividendo / $divisor;
    }
}