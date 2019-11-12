<?php


class AdminController {
    
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
                $errors[] = 'Логин не должен быть короче 3-х символов';
            }
            if (!Admin::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 3-х символов';
            }
            if (!Admin::checkFname($f_name)) {
                $errors[] = 'Имя не должно быть короче 3-х символов';
            }
            if (!Admin::checkLname($l_name)) {
                $errors[] = 'Фамилия не должна быть короче 3-х символов';
            }
            if (!Admin::checkGender($gender)) {
                $errors[] = 'Гендер не должен быть короче одного символа';
            }
            if (!Admin::checkDateOfBirth($date_of_birth)) {
                $errors[] = 'Дата рождения не должна быть короче 6 символов';
            }
            if (Admin::checkLoginExists($login)) {
                $errors[] = 'Такой логин уже используется';
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
            
           
            //Проверяем существует ли пользователь
            $adminId = Admin::checkAdminData($login, $password);
            
            if ($adminId == false) {
                //Если данные неправильные - показываем ошибку
                $errors[] = 'Incorrect data for enter';
            } else {
                //Если данные правильные, запоминаем пользователя (сессия)
                Admin::auth($adminId);
                
                //Перенаправляем пользователя в закрытую часть
                header("Location: /users/page-1");
            }
            
        }
        require_once(ROOT.'/views/admin/login.php');
        return true;
        
        
    }
    
    public function actionEdit() 
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            echo $id;
            $user = Admin::findUser($id);
            var_dump($user);
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
        
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $gender = $_POST['gender'];
            $date_of_birth = $_POST['date_of_birth'];
            
            $errors = false;
            
            if (!Admin::checkLogin($login)) {
                $errors[] = 'Логин не должен быть короче 3-х символов';
            }
            if (!Admin::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 3-х символов';
            }
            if (!Admin::checkFname($f_name)) {
                $errors[] = 'Имя не должно быть короче 3-х символов';
            }
            if (!Admin::checkLname($l_name)) {
                $errors[] = 'Фамилия не должна быть короче 3-х символов';
            }
            if (!Admin::checkGender($gender)) {
                $errors[] = 'Гендер не должен быть короче одного символа';
            }
            if (!Admin::checkDateOfBirth($date_of_birth)) {
                $errors[] = 'Дата рождения не должна быть короче 6 символов';
            }
            if (Admin::checkLoginExists($login)) {
                $errors[] = 'Такой логин уже используется';
            }
            if ($errors == false) {
                $result = Admin::updateUser($id, $login, $password, $f_name, $l_name, $gender, $date_of_birth);
                
            }
        } 
        
        
        require_once(ROOT.'/views/admin/edit.php');
        
    }
}
