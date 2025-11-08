<?php
    // ========== INTERFACE 1: NOTIFICACIÓN ==========
    interface Notificacion {
        // CONTANTES en interfaces
        const TIPO_URGENTE = 'urgente';
        const TIPO_NORMAL = 'normal';
        const TIPO_INFORMATIVO = 'informativo';

        // MÉTODOS que deben implementarse
        public function enviar($mensaje, $destinatario);
        public function obtenerTipo();
    }

    // ========== INTERFACE 2: LOGGING ==========
    interface Logging {
        const NIVEL_INFO = 'info';
        const NIVEL_ERROR = 'error';

        public function registrarLog($mensaje, $nivel);
    }

    // ========== INTERFACE 3: CONFIGURACIÓN ==========
    interface Configuracion {
        public function obtenerConfiguracion();
        public function actualizarConfiguracion($clave, $valor);
    }

    // ========== CLASE 1: IMPLEMENTA NOTIFICACIÓN Y LOGGING ==========
    class EmailNotificacion implements Notificacion, Logging, Configuracion {
        private $logs = [];
        private $configuracion = [
            'servidor' => 'smtp.gmail.com',
            'perto' => 587,
            'seguro' => true
        ];

        // ========== IMPLEMENTACIÓN de NOTIFICACION ==========
        public function enviar($mensaje, $destinatario) {
            //Registrar log antes de enviar
            $this->registrarLog("Intentando enviar email a: $destinatario", self::NIVEL_INFO);

            // Simular envio de email
            $resultado = "Email enviado a: $destinatario - Mensaje: $mensaje";

            // Registrar log despues de enviar
            $this->registrarLog("Email enviado existosamente", self::NIVEL_INFO);
        }

        public function obtenerTipo() {
            return self::TIPO_NORMAL;
        }

        // ========== IMPLEMENTACIÓN de LOGGING ==========
        public function registrarLog($mensaje, $nivel) {
            $fecha = date('Y-m-d H:i:s');
            $logEntry = "[$nivel] $fecha - $mensaje";
            $this->logs[] = $logEntry;
        }

        // ========== IMPLEMENTACIÓN de CONFIGURACIÓN ==========
        public function obtenerConfiguracion() {
            return $this->configuracion;
        }

        public function actualizarConfiguracion($clave, $valor) {
            $this->configuracion[$clave] = $valor;
            $this->registrarLog("Configuración actualizada: $clave = $valor", self::NIVEL_INFO);
            return "Configuración actualizada: $clave";
        }

         // ========== MÉTODO PROPIO de la clase ==========
        public function mostrarLogs() {
            echo "<h4>📋 Logs del Sistema:</h4>";
            foreach ($this->logs as $log) {
                echo "$log<br>";
            }
        }
        
        public function mostrarInfo() {
            echo "<h4>ℹ️ Información del Servicio:</h4>";
            echo "Tipo: " . $this->obtenerTipo() . "<br>";
            echo "Configuración actual:<br>";
            print_r($this->obtenerConfiguracion());
        }
    }

    // ========== PROGRAMA DE PRUEBA ==========
    echo "<h3>Sistema de notificaciones de email con 3 Interfaces</h3>";

    $email = new EmailNotificacion();

    echo "<h4>1. Enviar Notificación:</h4>";
    echo $email->enviar("Bienvenido al Sistema", "usuario@gmail.com") . "</br>";

    echo "<h4>2. Actualizar Configuración:</h4>";
    echo $email->actualizarConfiguracion('puerto', 465) . "<br>";
    echo $email->actualizarConfiguracion('timeout', 30) . "<br>";

    echo "<h4>3. Mostrar Información:</h4>";
    $email->mostrarInfo();

    echo "<h4>4. Mostrar Logs:</h4>";
    $email->mostrarLogs();

    // ========== DEMOSTRACIÓN DE QUE IMPLEMENTA LAS 3 INTERFACES ==========
    echo "<h4>5. ✅ Verificación de Interfaces:</h4>";

   
?>