<?php
class Base {
        /**
         * Creating application object
         * 
         * @return Application object
         */
        public static function WebApplication()
        {
                return self::Application('DApplication'); 
        }
        
        /**
         * Creating new Application
         * 
         * @param string $name
         * @return object 
         */
        public static function Application($name)
        {
                self::registerAutoloader();
                $module = $name."Module";
                $rules = call_user_func(array($module, 'rules'));
                $usable = call_user_func(array($module, 'usable'));
                if ($rules['available']==='system') {
                        if (in_array (__CLASS__, $usable)) {
                                return new $name();
                        } else {
                                Base::ShowErrorMessage('Unallowed access');
                        }
                } else {
                        return new $name();
                }
                
        }
        
        /**
         * Redirects to error page
         * 
         * @param string $TYPE 
         */
        public static function ShowErrorMessage($TYPE)
        {
                print_r("Problem with ".$TYPE);
        }
        
        /**
         * Defined class loader method
         * 
         * @param string $class 
         */
        public static function autoloader($class)
        {
                $ERR = false;
                $PATH = Base::ClassPlaceHolder();
                $PATH_MOD = Base::ModulePlaceHolder();
                if (array_key_exists($class, $PATH))
                        $PATH = $PATH[$class];
                else if (array_key_exists($class, $PATH_MOD))
                        $PATH = $PATH_MOD[$class];
                else
                        $PATH = null;
                $FILENAME = ROOT . DS . $PATH . DS . $class . ".php";
                if (is_file($FILENAME))
                        require $FILENAME;
                else {
                        $ERR = true;
                        $FILENAME = ROOT . DS . "Base" . DS . "Controllers" . DS . $class . ".php";
                        if (is_file ($FILENAME)) {
                                require $FILENAME;
                                $ERR = false;
                        }
                        else{
                                $ERR = true;
                                $FILENAME = ROOT . DS . "Base" . DS . "Models" . DS . $class . ".php";
                                if (is_file ($FILENAME)) {
                                        require $FILENAME;
                                        $ERR = false;
                                } else {
                                        $ERR = true;
                                }
                        }   
                }
                if ($ERR)
                        Base::ShowErrorMessage ('autoload');
        }
        
        /**
         * Registering all needed autoloader functions 
         */
        public static function registerAutoloader()
        {
                spl_autoload_register(array ('Base', 'autoloader'));
        }
        
        /**
         * Redirect to URL
         * 
         * @param type $ADDRESS 
         */
        public static function redirect($ADDRESS)
        {
                $URL = $_SERVER['PHP_HOST'] . "index.php?page=" . $ADDRESS[0];
                array_shift($ADDRESS);
                if (count($ADDRESS)>0)
                        $URL .= "&" . http_build_query($ADDRESS);
                header ('Location: '.$URL);
        }
        
        /**
         * Retrieves URL parameter,
         * Using DController method.
         * Usage of this class is to be easier to write.
         * 
         * @param string $param
         * @return boolean or string - according if variable is found
         */
        public static function getUrlParam($param)
        {
                return DController::getUrlParam($param);
        }
        
        /**
         * Class name => place in folder structure
         * 
         * @return array 
         */
        public static function ClassPlaceHolder()
        {
                return array (
                    "DApplicationTemplate"      =>      "Base/Templates",
                    "DApplication"              =>      "Base",
                    "DComponent"                =>      "Base/Components",
                    "DModel"                    =>      "Base/Core",
                    "DModule"                   =>      "Base/Modules",
                    "DController"               =>      "Base/Core",
                    "DView"                     =>      "Base/Views",
                    "DTemplate"                 =>      "Base/Templates",
                    "DMySQL"                    =>      "Base/Library",
                );
        }
        
        /**
        * @return array/string
        */
        public static function ModulePlaceHolder()
        {
                return array (
                        "DApplicationModule"    =>      "Base/Modules/Application",
                );
        }
}

require ROOT . DS . 'Properties' . DS . 'Init.php';

