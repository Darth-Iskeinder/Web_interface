<?php


class UsersController {
    
    public function actionIndex() 
    {
        echo 'List of users';
        return true;
        
    }
    public function actionView() 
    {
        echo '1 user';
        return true;
        
    }
}
