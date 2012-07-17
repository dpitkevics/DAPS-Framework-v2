<?php

class DHtml extends DModule {
        
        /**
         * Creates Html element from sent data,
         * Using patterns defined below
         * 
         * @param string $name
         * @param array/string $tags
         * @param string $type
         * @return string
         */
        protected static function generateHtml($name, $tags, $type) {
                $paramList = self::ParamList();
                $paramList = $paramList[$type];
                $structureList = self::StructureList();
                $structureList = $structureList[$type];

                $params = '';
                foreach ($tags as $key => $value) {
                        if (in_array($key, $paramList)) {
                                $params .= $key."='".$value."' ";
                        }
                }
                $html = str_replace("###", $params, $structureList);
                $html = str_replace("$$$", $name, $html);
                return $html;
        }
        
        /**
         * Returns fully generated html code of Link
         * 
         * @param string $name
         * @param array/string $href
         * @param array/string $params
         * @return generated html content/string 
         */
        public function Link ($name, $href = array(), $params = array())
        {
                return new Link($name, $href, $params);
        }
        
        /**
         * Return fully generated html code of Button
         * 
         * @param string $name
         * @param array/string $params
         * @return generated html content/string
         */
        public function Button ($name, $params = array())
        {
                return new Button($name, $params);
        }
        
        /**
         * Defines available attributes for each html tag
         * 
         * @return array/string 
         */
        private static function ParamList ()
        {
                return array (
                    "a"         =>      array (
                        "charset", "coords", "href",
                        "hreflang", "name", "rel",
                        "rev", "shape", "target",
                        "style",
                    ),
                    "button"    =>      array (
                        "disabled", "name", "type",
                        "value", "accesskey", "class",
                        "dir", "id", "lang", "style",
                        "tabindex", "title", "xml:lang",
                    ),
                );
        }
        
        /**
         * Defines pattern for each html tag
         * 
         * @return array
         */
        private static function StructureList ()
        {
                return array (
                    "a"         =>      "<a ###>$$$</a>",
                    "button"    =>      "<button ###>$$$</button>"
                );
        }
        
        /**
         * Defines event list for each html tag 
         */
        private static function EventList ()
        {
                return array (
                    "button"    =>      array (
                        "onblur", "onblick", "ondblclick",
                        "onfocus", "onmousedown", "onmousemove",
                        "onmouseout", "onmouseover", "onmouseup",
                        "onkeydown", "onkeypress", "onkeyup",
                    ),
                );
        }
}
