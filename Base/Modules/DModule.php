<?php

class DModule extends DComponent{
    protected static $_moduleId;
    protected static $_modulePath;
    protected static $_moduleName;
    protected static $_instanceOfModule=null;
    protected static $_controllerName;
    protected $_loadedModules;
    protected $_allModules=array();
    protected $_componentName;
    protected $_componentPath;
    
    private $_moduleVirtualPath;
    private $_instanceOfVirtualModule=null;
    
    /**
     * Creates module for future use
     * 
     * @param string $moduleName
     * @return object of module
     */
    public static function createModule($moduleName)
    {
            $modulePath = Base::ModulePlaceHolder();
            self::$_moduleName  = $moduleName;
            self::$_modulePath  = $modulePath[self::$_moduleName];
            self::$_moduleId    = SHA1(time() . rand(100000000, 999999999));
            if (self::$_instanceOfModule === null) 
            {
                    self::$_instanceOfModule = new self::$_moduleName;
                    return self::$_instanceOfModule;
            }
            else
                    return self::$_instanceOfModule;
            
    }
    
    /**
     * Returns directory name of current Module
     * 
     * @return string 
     */
    public function getBasePath()
    {
            return dirname(__FILE__);
    }
    
    /**
     * Setting virtual path of Module.
     * To be able to change Place Holders for modules,
     * To be able to have two modules at the same time.
     * 
     * @param type $path 
     */
    public function setVirtualPath($path)
    {
            $this->_moduleVirtualPath = $path;
    }
    
    /**
     * Return of Module virtual path
     * 
     * @return string
     */
    public function getVirtualPath()
    {
            return $this->_moduleVirtualPath;
    }
    
    /**
     * Creates a new Virtual Module
     * 
     * @param string $name
     * @return boolean or instance of virtual module
     */
    public function createVirtualModule($name)
    {
            if (!empty($this->_moduleVirtualPath))
            {
                    require_once $this->_moduleVirtualPath;
                    if ($this->_instanceOfVirtualModule === null)
                        return $this->_instanceOfVirtualModule = new $name;
                    else
                            return false;
            }
            else
                    return false;
    }
}

