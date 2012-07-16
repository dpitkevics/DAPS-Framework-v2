<?php

class SiteModel extends DModel {
        public function getUsers()
        {
                return $this->getAll('users');
        }
}

