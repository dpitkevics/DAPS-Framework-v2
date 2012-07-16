<?php

class DApplication extends DModule{
        /**
         * Used to store all undefined variables
         * 
         * @var string array 
         */
        protected $_data = array();
        
        /**
         * Gets users PHP Version
         * 
         * @var string 
         */
        protected $_PHPVersion;
        
        /**
         * Sets Framework version
         * 
         * @var string 
         */
        public $_DVersion;
        
        /**
         * Instance of Web, used to check if is valid,
         * if created and retrieving object
         * 
         * @var object 
         */
        public $_instanceOfWeb;
        
        /**
         * Setting default values of class properties 
         */
        public function __construct()
        {
                $module = DModule::createModule(__CLASS__ ."Module");
                $this->_PHPVersion = phpversion();
                $this->_DVersion = "1.0.0.0";
                $this->_instanceOfWeb = $this;
        }
        
        /**
         * Application executing 
         */
        public function execute()
        {
                global $config;
                if (!isset($_GET['page'])) {
                        DModule::$_controllerName = $config['route']['defaultController'];
                        $controller = new $config['route']['defaultController'];
                        $defaultAction = "page".ucfirst($config['route']['defaultPage']);
                        $controller->rules();
                        $controller->$defaultAction();
                } else {
                        $url = $_GET;
                        $page = explode ('/', $url['page']);
                        if ($page[0] != '') {
                                $cont = ucfirst($page[0])."Controller";
                                DModule::$_controllerName = $cont;
                                $controller = new $cont;
                        } else {
                                DModule::$_controllerName = $config['route']['defaultController'];
                                $controller = new $config['route']['defaultController'];
                        }
                        array_shift($page);
                        if ($page[0] != '') {
                                $action = "page".ucfirst($page[0]);
                        } else {
                                $action = "page".ucfirst($config['route']['defaultPage']);
                        }
                        array_shift($page);
                        $controller->rules();
                        $controller->$action((isset($page[0]))?$page[0]:null);
                }
        }
}

