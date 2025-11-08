<?php
    Class Persona {
        public $nombre;
        private $edad;
        
        public function setNombre($nuevoNombre) {
            $this->nombre = $nuevoNombre;
        }

        public function getNombre() {
            echo "Hola soy: " . $this->nombre . "</br>";
        }
        
        public function getEdad() {
            $this->edad = 20;
            echo "Edad: " . $this->edad . "</br>";
        }
    }

    $persona1 = new Persona();
    $persona1->setNombre("Juan");
    $persona1->getNombre();
    $edad = new Persona();
    $edad->getEdad();
?>