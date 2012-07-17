<?php

class DMySQL extends DModule {
        private static $_instanceOfMySQL=null;
        public static function connect ()
        {
                global $config;
                if (self::$_instanceOfMySQL === null) {
                       $dbh = new mysqli (
                               $config['database']['host'],
                               $config['database']['user'],
                               $config['database']['password'],
                               $config['database']['db']
                       ); 
                       if ($dbh->connect_error) {
                               Base::ShowErrorMessage('mysql connection');
                       } else {
                               return $dbh;
                       }
                       self::$_instanceOfMySQL = $dbh;
                } else {
                        return self::$_instanceOfMySQL;
                }
        }
        /* UNCOMMENT TO USE PDO (COMMENT Code above if using PDO) */
        /*
        private static $_instanceOfMySQL=null;
        
        public static function connect ()
        {
                global $config;
                if (self::$_instanceOfMySQL === null) {
                        $dsn = "mysql:dbname=".$config['database']['db'].";host=".$config['database']['host'];
                        try {
                                $dbh = new PDO ($dsn, $config['database']['user'], $config['database']['password']);
                                self::$_instanceOfMySQL = $dbh;
                        } catch (PDOException $e) {
                                trigger_error($e->getMessage(), E_USER_ERROR);
                        }
                        return self::$_instanceOfMySQL;
                } else {
                        return self::$_instanceOfMySQL;
                }
        }
         * 
         */
}
