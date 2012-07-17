<?php

class Link extends DHtml {
        private $_href;
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
        public function __construct($name, $href, $params)
        {
                $this->_href = ($href == array()) ? Base::getUrlParam('page') : $href;
                $this->_params = $params;
                $this->_name = $name;
                $this->_type = "a";
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
                $href = array();
                $href['page'] = $this->_href[0];
                array_shift($this->_href);
                foreach ($this->_href as $key => $value) {
                        $href[$key] = $value;
                }
                $href = http_build_query($href);
                
                $tags = array();
                $tags['href'] = "index.php?".$href;
                foreach ($this->_params as $key => $value) {
                        $tags[$key] = $value;
                }
                
                return $tags;
        }
}

