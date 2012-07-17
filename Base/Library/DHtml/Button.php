<?php

class Button extends DHtml {
        private $_params;
        private $_type;
        private $_name;
        
        /**
         * Sets sent values to private members
         * 
         * @param string $name
         * @param array/string $href
         * @param array/string $params 
         */
        public function __construct($name, $params)
        {
                $this->_params = $params;
                $this->_name = $name;
                $this->_type = "button";
        }
        
        /**
         * Allows to print generated html content
         * 
         * @return string
         */
        public function __toString() {
                return parent::generateHtml($this->_name, $this->generateTags(), $this->_type);
        }
        
        /**
         * Generate tags array for future use
         * 
         * @return array/string
         */
        private function generateTags() {
                return $this->_params;
        }
}
