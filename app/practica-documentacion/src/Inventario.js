/**
 * Módulo de Gestión de Inventario.
 * Script para gestionar la lógica de productos.
 *
 * @module GestorInventario
 * @author Cesar
 * @version 1
 */

/**
 * Estructura de un Producto.
 * @typedef {Object} Producto
 * @property {number} id - ID único.
 * @property {string} nombre - Nombre comercial.
 * @property {number} precio - Coste unitario.
 */

/**
 * Clase principal del almacén.
 */
class Inventario {

    /**
     * Crea el inventario.
     */
    constructor() {
        /**
         * @type {Producto[]} Lista de productos.
         * @private
         */
        this.productos = [];
    }

    /**
     * Agrega un producto.
     * @param {Producto} nuevoProducto - El objeto a insertar.
     * @returns {number} El nuevo tamaño del inventario.
     */
    agregar(nuevoProducto) {
        return this.productos.push(nuevoProducto);
    }
}