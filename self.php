<?php
    class Constante {
        const CONSTANTE = 'Constante 1</br>';

        public static function getConstante() {
            return "La constante es: " . self::CONSTANTE . "</br>";
        }
    }

    echo Constante::CONSTANTE;
    echo Constante::getConstante();
?>