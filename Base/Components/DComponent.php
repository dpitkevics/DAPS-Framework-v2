<?php

class DComponent implements DApplicationTemplate{
        /**
         * @var string
         */
        public $_ComponentName;
        
        /**
         * @var string
         */
        public $_ComponentType;
        
        /**
         * @var integer
         */
        public $_ComponentId;
        
        /**
         * @var short string
         */
        public $_ComponentTag;
        
        /**
         * @var array 
         */
        private $_data=array();
        
        /**
         * @param string $variable
         * @return string 
         */
        public function __get($variable) {
                if (class_exists($variable)) {
                        return new $variable;
                } else if (isset($this->_data[$variable]))
                        return $this->_data[$variable];
                else
                        return false;
        }
        
        /**
         * @param string $name
         * @param string $value 
         */
        public function __set($name, $value) {
                $this->_data[$name] = $value;
        }
        
        /**
         * Get value of private variable
         * 
         * @param string $variable
         * @return string/boolean 
         */
        public function getValue($variable) {
                $variable = "_" . $variable;
                return $this->$variable;
        }
        
       /**
        * Set value of private variable
        * 
        * @param string $name
        * @param string $value
        * @return boolean 
        */
        public function setValue($name, $value) {
                $name = "_" . $name;
                $this->$name = $value;
        }
        
        public function onClick() {
                
        }
}

