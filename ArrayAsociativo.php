<?php
    class TemplateEngine {
        public $vars = [
            'titulo' => 'Mi Página',
            'contenido' => 'Bienvenido al sitio',
            'autor' => 'Ana García'
        ];

        public function getHTML($template) {
            // $name será la CLAVE, $value será el VALOR
            foreach($this->vars as $name => $value) {
                // En cada iteración:
                // 1ª vuelta: $name = 'titulo', $value = 'Mi Página'
                // 2ª vuelta: $name = 'contenido', $value = 'Bienvenido al sitio'  
                // 3ª vuelta: $name = 'autor', $value = 'Ana García'

                $template = str_replace('{' . $name . '}', $value, $template);
            }
            return $template;
        }
    } 

    $engine = new TemplateEngine();

    $plantilla = "
        <h1>{titulo}</h1>
        <p>{contenido}</p>
        <small>Por: {autor}</small>
    ";

    echo $engine->getHTML($plantilla);
    /* Resultado:
        <h1>Mi Página</h1>
        <p>Bienvenido al sitio</p>
        <small>Por: Ana García</small>
    */
?>