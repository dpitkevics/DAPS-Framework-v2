<?php

class DCSS extends DModule {
        private $_defaultCss;
        public function __construct() {
                $rules = DController::getRules();
                $this->_defaultCss = $rules['template'] . ".css";
        }
        public function addCss($cssName = null) {
                $cssName = ($cssName == null) ? $this->_defaultCss : $cssName . ".css";
                $cssPATH = Base::ExternalFilePlaceHolder();
                $cssPATH = $cssPATH['CSS'] . DS . $cssName;
                return "<link rel='stylesheet' type='text/css' href='".$cssPATH."' />";
        }
}
