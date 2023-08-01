<?php
function validarNumeroMes($numero) {
    // Validar si es un número entero
    if (!filter_var($numero, FILTER_VALIDATE_INT)) {
        return false;
    }
    
    // Validar si está en el rango de 1 a 12
    if ($numero < 1 || $numero > 12) {
        return false;
    }
    
    return true;
}













function verificarOrdenMeses($numero1, $numero2) {
    return $numero1 <= $numero2;
}
