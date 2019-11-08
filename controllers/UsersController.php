<?php

include_once ROOT.'/models/Users.php';

class UsersController {
    
    public function actionIndex() 
    {
        $userList = array();
        $userList = Users::getUsersList();
        
        require_once(ROOT.'/views/users/index.php');
        return true;
        
    }
    public function actionView($id) 
    {
        if ($id) {
            $users = Users::getUsersById($id);
            
            echo '<pre>';
            print_r($users);
            echo '</pre>';
            
            echo 'actionView';
        }
        
        return true;
        
    }
}
