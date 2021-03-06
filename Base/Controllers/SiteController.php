<?php

class SiteController extends DController{
        public function rules ($enum = 'N') {
                parent::rules(array (
                    'template'          =>      'main',
                    'templateExtension' =>      'php',
                    'auth'              =>      false,
                ));
        }
        
        public function pageIndex () {
                $model = DController::getModel();
                $users = $model->getUsers();
                $this->template('index.php', array (
                    'title'     =>      'Index',
                    'name'      =>      $users[0]['name'],
                    'users'     =>      $users,
                    'pageTitle'      =>      'Some sort of Page',
                ));
        }
        
        public function pageDefault () {
                $this->template('default.php', array (
                    'title'     =>      'Default',
                    'name'      =>      'Peter',
                    'pageTitle' =>      'Default page',
                    'sidebar'   =>      new DTemplate("test.php", array('pageTitle'=>'Default page')),
                ));
        }
}

