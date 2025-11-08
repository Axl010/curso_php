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

        // MÉTODO 1: Inicializar datos del sistema
        private static function inicializaDatos() {
            self::$usuarios = [
                'admin' => [
                    'password' => password_hash('admin123', PASSWORD_DEFAULT),
                    'email' => 'admin@sistema.com',
                    'rol' => 'administrador'
                ],
                'usuario1' => [
                    'password' => password_hash('clave123', PASSWORD_DEFAULT),
                    'email' => 'usuario1@mail.com',
                    'rol' => 'usuario'
                ]
            ];
            echo "Sistema inicializaco con " . count(self::$usuarios) . " usuarios</br>";
        }

        // MÉTODO 2: Cerrar sesión
        public static function cerrarSesion($usuario) {
            if (isset(self::$usuariosLogueados[$usuario])) {
                unset(self::$usuariosLogueados[$usuario]);
                echo "Sesión cerrada para: " . $usuario . "</br>";
                return true;
            }
            return false;
        }

        // MÉTODO 3: Autenticar usuario
        public function autenticar($usuario, $password) {
            if (!isset(self::$usuarios[$usuario])) {
                return "Usuario no existe";
            }

            if (password_verify($password, self::$usuarios[$usuario]['password'])) {
                self::$usuariosLogueados[$usuario] = [
                    'fecha_login' => date('Y-m-d H:i:s'),
                    'rol' => self::$usuarios[$usuario]['rol']
                ];
                $this->usuarioActual = $usuario;
                return "Login exitoso: " . $usuario;
            }
            return "Contraseña Incorrecta";
        }

        // MÉTODO 4: Ver sesiones activas
        public static function verSesionesActivas() {
            return self::$usuariosLogueados;
        }
    }

    // PROGRAMA DE PRUEBA
    echo "<h3>Prueba Rápida</h3>";


    // Crear instancias
    $login1 = new LoginSystem();
    $login2 = new LoginSystem();

    echo "</br>";
    
    // Ver sesiones
    echo "Sesiones activas: ";
    print_r(LoginSystem::verSesionesActivas());

    echo "</br></br>";

    // Destruir (cierra sesiones automáticamente)
    unset($login1);
    unset($login2);
?>