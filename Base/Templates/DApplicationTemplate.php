<?php

interface DApplicationTemplate {
        public function __set($name, $value);
        public function __get($variable);
        public function setValue($name, $value);
        public function getValue($variable);
}

