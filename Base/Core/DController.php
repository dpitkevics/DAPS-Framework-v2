<?php

class DController extends DModule{
        private $_rules;
        private static $rules;
        private static $url_params=array();
        
        /**
         * Initializes all needed methods 
         */
        public function __construct()
        {
                self::loadUrl();
                self::getModel();
        }
        
        public static function getModel()
        {
                $model = str_replace('Controller', 'Model', DModule::$_controllerName);
                $model = new $model();
                return $model;
        }

        /**
         * Gets defined rules and stores as a private variable
         * 
         * @param type $rules 
         */
        public function rules ($rules)
        {
                $this->_rules = $rules;
                self::$rules = $rules;
        }
        
        /**
         * Returns rules defined in Controller
         * 
         * @return array/string
         */
        public static function getRules ()
        {
                return self::$rules;
        }
        
        /**
         * Loads url's parameters 
         */
        public static function loadUrl ()
        {
                foreach ($_GET as $key => $value) {
                        if ($key != 'page') {
                                DController::$url_params[$key] = htmlentities($value);
                        }
                }
        }
        
        /**
         * Retrieves one specific url parameter,
         * Also can call Base::getUrlParam($param)
         * 
         * @param string $param
         * @return boolean or string - according if variable is found 
         */
        public static function getUrlParam($param)
        {
                if (isset(DController::$url_params[$param]))
                        return htmlentities(DController::$url_params[$param]);
                else
                        return false;
        }
        /**
         * Renders a template on the screen
         * 
         * @param string $name
         * @param array/string $tags 
         */
        public function template($name, $tags = array()) {
                if (isset($this->_rules['templateExtension']))
                        $ext = $this->_rules['templateExtension'];
                else
                        $ext = "php";
                $template = new DTemplate($this->_rules['template'].".".$ext);
                $sub_template = new DTemplate($name);
                $sub_template->Set($tags);
                $template->Set($tags);
                $template->Set('content', $sub_template);
                echo $template->parse();
        }
}

