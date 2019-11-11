<?php



class UsersController {
    
    public function actionIndex($page = 1) 
    {
        
        $userList = array();
        $userList = Users::getUsersList($page);
        
        $total = Users::getTotalUsers();
        
        //Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, 2, 'page-');
        
        require_once(ROOT.'/views/users/index.php');
        return true;
        
    }
    public function actionView($id) 
    {
        
        if ($id) {
            $users = Users::getUsersById($id);
            
            require_once(ROOT.'/views/users/user_id.php');
            
            echo 'actionView';
        }
        
        return true;
        
    }
}
