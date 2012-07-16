<?php

class DModel extends DModule{
        private static $_connection;
        public function __construct ()
        {
                self::$_connection = DMySQL::connect();
        }
        
        public function getAll ($table)
        {
                $query = self::$_connection->query("SELECT * FROM $table");
                $data = array();
                while($row = $query->fetch_assoc()) {
                        $data[] = $row;
                }
                return $data;
        }
}
