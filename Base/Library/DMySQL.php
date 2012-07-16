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
}
