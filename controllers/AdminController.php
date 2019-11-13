<?php


class AdminController {
    
    //Create new users with validation
    public function actionCreate() 
    {
        $login = '';
        $password = '';
        $f_name = '';
        $l_name = '';
        $gender = '';
        $date_of_birth = '';
        
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $gender = $_POST['gender'];
            $date_of_birth = $_POST['date_of_birth'];
            
            $errors = false;
            
            if (!Admin::checkLogin($login)) {
                $errors[] = 'Login must be at least 3 characters';
            }
            if (!Admin::checkPassword($password)) {
                $errors[] = 'Password must be at least 3 characters';
            }
            if (!Admin::checkFname($f_name)) {
                $errors[] = 'Name must be at least 3 characters';
            }
            if (!Admin::checkLname($l_name)) {
                $errors[] = 'Surname must be at least 3 characters';
            }
            if (!Admin::checkGender($gender)) {
                $errors[] = 'Gender must be at least 1 character';
            }
            if (!Admin::checkDateOfBirth($date_of_birth)) {
                $errors[] = 'Date of birth must be at least 6 characters';
            }
            if (Admin::checkLoginExists($login)) {
                $errors[] = 'This is already in use';
            }
            if ($errors == false) {
                $result = Admin::addUser($login, $password, $f_name, $l_name, $gender, $date_of_birth);
            }
            
        }
        require_once(ROOT.'/views/admin/create.php');
        return true;
        
    }
    
    //Admin autorization
    public function actionLogin() 
    {
        $login = '';
        $password = '';
        
        if (isset($_POST['submit'])) {
            
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $errors = false;
            
           
            //Check if admin exist
            $adminId = Admin::checkAdminData($login, $password);
            
            if ($adminId == false) {
                //If the data is incorrect - show the error
                $errors[] = 'Incorrect data for enter';
            } else {
                //If the data is correct, remember the user (session)
                Admin::auth($adminId);
                
                //We redirect the user to the closed part
                header("Location: /users/page-1");
            }
            
        }
        require_once(ROOT.'/views/admin/login.php');
        return true;
        
        
    }
    
    /*
     * Find user by user and update
     */
    public function actionEdit() 
    {
        //if $_GET consist of id
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $user = Admin::findUser($id);
            
            
        }else{
            echo 'Something wrong';
            exit;
        }
        
        $id = '';
        $login = '';
        $password = '';
        $f_name = '';
        $l_name = '';
        $gender = '';
        $date_of_birth = '';
        
        //if $_POST consist of submit
        if (isset($_POST['submit'])) {
            echo $id = $_POST['id'];
            echo $login = $_POST['login'];
            echo $password = $_POST['password'];
            echo $f_name = $_POST['f_name'];
            echo $l_name = $_POST['l_name'];
            echo $gender = $_POST['gender'];
            echo $date_of_birth = $_POST['date_of_birth'];
            
            $errors = false;
            
            if (!Admin::checkLogin($login)) {
                $errors[] = 'Login must be at least 3 characters';
            }
            if (!Admin::checkPassword($password)) {
                $errors[] = 'Password must be at least 3 characters';
            }
            if (!Admin::checkFname($f_name)) {
                $errors[] = 'Name must be at least 3 characters';
            }
            if (!Admin::checkLname($l_name)) {
                $errors[] = 'Surname must be at least 3 characters';
            }
            if (!Admin::checkGender($gender)) {
                $errors[] = 'Gender must be at least 1 character';
            }
            if (!Admin::checkDateOfBirth($date_of_birth)) {
                $errors[] = 'Date of birth must be at least 6 characters';
            }
            if (Admin::checkLoginExists($login)) {
                $errors[] = 'This is already in use';
            }
            if ($errors == false) {
                $result = Admin::updateUser($id, $login, $password, $f_name, $l_name, $gender, $date_of_birth);
                
            }
        } 
        
        
        require_once(ROOT.'/views/admin/edit.php');
        
    }
}
