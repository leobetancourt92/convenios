<?php

namespace mvc\xss {

    use mvc\interfaces\xssInterface;


    /**
     * Description of xssValidatorClass
     *
     * @author Leonardo Betancourt <leobetacai@gmail.com>
     */
    class xssValidatorClass implements xssInterface {

        private static $instance;

        /**
         *
         * @return xssValidatorClass
         */
        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        static public function filterXSS($val) {
            // remover todos  los caracteres que no se pueden imprimir en pantalla. CR(0a) y LF(0b) y TAB(9) son permitidos 
            // esto previene algunos caracteres tales como el introducir espacios tales como <java\0script>  
            // note que  usted tiene  que manejar separadores como  \n, \r, y \t despues ya que since ellos *son* permitidos en algunas entradas  
            $val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);

              
            // esto perviene  ataques e inserciones tales como <img src="@avascript:alert('XSS')">  
            $search = 'abcdefghijklmnopqrstuvwxyz';
            $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $search .= '1234567890!@#$%^&*()';
            $search .= '~`";:?+/={}[]-_|\'\\';
            for ($i = 0; $i < strlen($search); $i++) {
                // ;? coincidencias ;, opcional  
                // 0{0,7} coincidencias con ceros, son opcionales y para cadenas superiores a 8 caracteres  
                // @ @ busqueda de valores en hexadecimal  
                $val = preg_replace('/(&#[x|X]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val); // with a ;  
                // @ @ 0{0,7} encontrar el valor '0'  siete veces en la cadena de  caracteres.
                $val = preg_replace('/(�{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // con un  ';'  
            }

            


           //ahora solo faltan los espacios en blanco  con    are \t, \n, and \r 
            
            $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
            $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
            $ra = array_merge($ra1, $ra2);

            $found = true;  
            while ($found == true) {
                $val_before = $val;
                for ($i = 0; $i < sizeof($ra); $i++) {
                    $pattern = '/';
                    for ($j = 0; $j < strlen($ra[$i]); $j++) {
                        if ($j > 0) {
                            $pattern .= '(';
                            $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
                            $pattern .= '|(�{0,8}([9][10][13]);?)?';
                            $pattern .= ')?';
                        }
                        $pattern .= $ra[$i][$j];
                    }
                    $pattern .= '/i';
                    $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // agrega  en  <> para debilitar la etiqueta 
                    $val = preg_replace($pattern, $replacement, $val); // filtrado de los valores en hexadecimal  
                    if ($val_before == $val) {
                        // si  el filtro no se activa por ninguna de las  condiciones ,retorna un falso y se termina el ciclo de verificación
                        $found = false;
                    }
                }
            }

            return $val;
        }

    }

}