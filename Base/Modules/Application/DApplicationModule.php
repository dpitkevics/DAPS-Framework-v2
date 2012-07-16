<?php

class DApplicationModule {
        /**
         * Returns available events for this module
         * 
         * @return array/string 
         */
        public static function events ()
        {
                return array (
                    'onLoad',
                    'onDestroy',
                );
        }
        
        /**
         * Returns rules for DApplication class
         * 
         * @return array/string 
         */
        public static function rules ()
        {
                return array (
                    'main',
                    'available'=>'system',
                    'auth'=>'false',
                );
        }
        
        /**
         * Returns Classes in which DApplication class can be called
         * 
         * @return array/string 
         */
        public static function usable ()
        {
                return array (
                    'DApplication',
                    'Base',
                );
        }
}
