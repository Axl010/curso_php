<?php
    Class Persona {
        public $nombre;     // Accesible desde Empleado
        private $edad;      // NO accesible desde Empleado
        
        public function setNombre($nuevoNombre) {
            $this->nombre = $nuevoNombre;
            return $this; // Permite encadenar métodos
        }

        public function getNombre() {
            return $this->nombre;
        }
        
        public function getEdad() {
            $this->edad = 20;
            return $this->edad;
        }

        public function saludar() {
            return "Hola soy: " . $this->nombre . "</br>";
        }
    }

    Class Empleado extends Persona {
        // ↑           ↑          ↑
        // Clase hija  keyword   Clase padre

        public $cargo;

        public function setCargo($nuevoCargo) {
            $this->cargo = $nuevoCargo;
            return $this;
        }

        public function getCargo() {
            return $this->cargo;
        }

        public function getInfo() {
            $edad = parent::getEdad(); // Llama al método del padre
            return "Nombre: " . $this->getNombre() . 
                "</br>Cargo: " . $this->getCargo() . 
                "</br>Edad: " . $edad;
        }
    }

    $empleado = new Empleado();
    $empleado->setNombre("Juan Perez")->setCargo("Desarrollador Web");
    
    echo $empleado->saludar();
    $empleado->getCargo(); // Propio de Empleado
    echo $empleado->getInfo();
?>