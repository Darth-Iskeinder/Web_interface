<?php



class UsersController {
    
    /*
     * Get users list from database and at certain limit
     */
    public function actionIndex($page = 1) 
    {
        
        $userList = array();
        $userList = Users::getUsersList($page);
        
        $total = Users::getTotalUsers();
        
        //Create a Pagination Object - pagination
        $pagination = new Pagination($total, $page, 2, 'page-');
        
        require_once(ROOT.'/views/users/index.php');
        return true;
        
    }
    
    /*
     * Get personal data by each users
     */
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
