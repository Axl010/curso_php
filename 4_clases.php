<?php
    class Persona {
        public $nombre; // propiedad para almacenar el nombre
        private $edad;  // propiedad privada, solo accesible dentro de la clase
        protected $altura; // propiedad protegida, solo accesible dentro de la clase y sus subclases

        public function asignarNombre($nuevoNombre) { // Metodo para asignar el nombre
            $this->nombre = $nuevoNombre;
        }

        public function imprimirNombre() { // Metodo para imprimir el nombre
            echo "El nombre de la persona es: " . $this->nombre . "</br>";
        }
    }

    $persona1 = new Persona(); // Instancia o creacion del objeto
    $persona1->asignarNombre("Juan Perez"); // Llamado al metodo para asignar el nombre
    $persona1->imprimirNombre();

    $persona2 = new Persona();
    $persona2->asignarNombre("María Gómez");
    $persona2->imprimirNombre();
?>