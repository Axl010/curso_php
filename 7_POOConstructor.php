<?php
    Class Persona {
        public $nombre;

        public function __construct($nombre, $edad = 18) {
            $this->nombre = $nombre;
            $this->edad = $edad;
            echo "Se agrego una persona: " . $this->nombre . "</br>";
        }

        // DESTRUCTOR de Persona
        public function __destruct() {
            echo "</br>Se elimino la persona: " . $this->nombre . "</br>";
        }
        
        public function setNombre($nuevoNombre) {
            $this->nombre = $nuevoNombre;
            return $this;
        }

        public function getNombre() {
            echo $this->nombre;
        }

        public function getEdad() {
            return $this->edad;
        }

        public function saludar() {
            return "Hola soy " . $this->nombre . " y tengo " . $this->edad . " años.</br>";
        }
    }

    class Empleado extends Persona {
        public $cargo;
        public $salario;

        // DESTRUCTOR de Empleado
        public function __destruct() {
            echo "Se DESTRUYÓ un Empleado: " . $this->cargo . "</br>";
            parent::__destruct(); // Llamar al destructor del padre
        }

        public function setCargo($nuevoCargo) {
            $this->cargo = $nuevoCargo;
            return $this;
        }

        public function getCargo() {
            return $this->cargo;
        }
        
        public function getInfoCompleta() {
            return $this->saludar() . ", trabajo como " . $this->cargo . " y gano $" . $this->salario;
        }
    }

    // 🚀 PROGRAMA PRINCIPAL
    echo "🏁 INICIO DEL PROGRAMA</br></br>";

    // Crear Objetos
    echo "📦 CREANDO OBJETOS:</br>";
    $persona1 = new Persona("Ana garcia", 25);
    $empleado1 = new Empleado("Luis Perez", 30);
    $empleado2 = new Empleado("María Rodríguez", "Diseñadora", 2500);

    echo "</br>";

    // Uso de Objetos
    echo "👥 USO DE OBJETOS:</br>";
    echo $persona1->saludar();
    echo $empleado1->getInfoCompleta() . "</br>";
    echo $empleado2->getInfoCompleta() . "</br>";

    echo "</br>";

    // Destruir objetos manualmente (normalmente se destruyen automáticamente al final del script)
    echo "🗑️ DESTRUYENDO OBJETOS:</br>";
    unset($persona1);  // Se ejecuta __destruct() de Persona
    unset($empleado1); // Se ejecuta __destruct() de Empleado y luego de Persona

    echo "</br>";

    echo "🏁 FIN DEL PROGRAMA - Los objetos restantes se destruyen automáticamente</br>";
?>