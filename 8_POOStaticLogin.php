<?php
    class LoginSystem {
        // PROPIEDADES ESTÁTICAS - pertenecen a la clase
        private static $usuarios = [];
        private static $usuariosLogueados = [];
        private static $instanciasCreadas = 0;

        // PROPIEDADES DE INSTANCIA
        private $idInstancia;
        private $usuarioActual;
        private $fechaCreacion;

        // Constructor
        public function __construct($usuario = null) {
            // Inicializar datos si es la primera instancia
            if(empty(self::$usuarios)) {
                self::inicializaDatos();
            }

            // Contador de instancias
            self::$instanciasCreadas++;
            $this->idInstancia = self::$instanciasCreadas;
            $this->usuarioActual = $usuario;
            $this->fechaCreacion = date('Y-m-d H:i:s');

            echo "Constructor: Instancia LoginSystem #" . $this->idInstancia . " creada</br>";
        }

        // Destructor
        public function __destruct() {
            // Registrar cierre de sesión si estaba autenticado
            if ($this->usuarioActual && isset(self::$usuariosLogueados[$this->usuarioActual])) {
                self::cerrarSesion($this->usuarioActual);
            }
            
            echo "Destructor: Instancia LoginSystem #" . $this->idInstancia . " destruida</br>";
        }
    }
?>