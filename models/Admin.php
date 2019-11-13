<?php


class Admin 
{
    /*
     * Add new users in database getting from create form
     */
    public static function addUser($login, $password, $f_name, $l_name, $gender, $date_of_birth) 
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO users (login, password, f_name, l_name, gender, date_of_birth) VALUES(:login, :password, :f_name, :l_name, :gender, :date_of_birth)";
        
        
        try {
            $result = $db->prepare($sql);
            $result->bindParam(":login", $login, PDO::PARAM_STR);
            $result->bindParam(":password", $password, PDO::PARAM_STR);
            $result->bindParam(":f_name", $f_name, PDO::PARAM_STR);
            $result->bindParam(":l_name", $l_name, PDO::PARAM_STR);
            $result->bindParam(":gender", $gender, PDO::PARAM_STR);
            $result->bindParam(":date_of_birth", $date_of_birth, PDO::PARAM_STR);
        
        return $result->execute();
        } 
        catch (PDOException $e) {
            echo "PDO error: ".$e->getMessage();
        }
        
            
        
        
        
    }
    //Checking login for string length
    public static function checkLogin($login) {
        if (strlen($login) >=3) {
            return true;
        }
        return false;
    }
    //Checking password for string length
    public static function checkPassword($password) {
        if (strlen($password) >=3) {
            return true;
        }
        return false;
        
    }
    //Checking Name for string length
    public static function checkFname($f_name) {
        if (strlen($f_name) >=3) {
            return true;
        }
        return false;
        
    }
    //Checking Surname for string length
    public static function checkLname($l_name) {
        if (strlen($l_name) >=3) {
            return true;
        }
        return false;
        
    }
    //Checking gender for string length
    public static function checkGender($gender) {
        if (strlen($gender) >=1) {
            return true;
        }
        return false;
        
    }
    //Checking date of birth for string length
    public static function checkDateOfBirth($date_of_birth) {
        if (strlen($date_of_birth) >=6) {
            return true;
        }
        return false;
        
    }
    //Checking login on exist
    public static function checkLoginExists($login) {
        $db = Db::getConnection();
        
        $sql = 'SELECT COUNT(*) FROM users WHERE login = :login';
        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        
        
        if($result->fetchColumn()) {
            return true;
        }
        return false;
    }


    
    
    //Check admin from data
    public static function checkAdminData($login, $password) 
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM admin WHERE login = :login AND password = :password';
        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        
        $admin = $result->fetch();
        if($admin) {
            return $admin['id'];
        }
        return false;
        
    }
    
    //Remember admin
    public static function auth($adminId) 
    {
        session_start();
        $_SESSION['admin'] = $adminId;
        
    }
    
    //Search user by id
    public static function findUser($id)
            
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM users WHERE id=:id";
        
        try {
            
            $result = $db->prepare($sql);
            $result->bindValue(":id", $id);
            $result->execute();
            
            $user = $result->fetch(PDO::FETCH_ASSOC);
            
        return $user;
             
        } catch(PDOException $e){
            echo $sql."<br>".$e->getMessage();
               
        }
        
        
    }
    
    //Update personal information user
    public static function updateUser($id, $login, $password, $f_name, $l_name, $gender, $date_of_birth) 
    {
        $db = Db::getConnection();
        $sql = "UPDATE users id=:id, login=:login, password=:password, f_name=:f_name, l_name=:l_name, gender=:gender, date_of_birth=:date_of_birth WHERE id=:id";
        
        try {
            $result = $db->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_STR);
            $result->bindParam(":login", $login, PDO::PARAM_STR);
            $result->bindParam(":password", $password, PDO::PARAM_STR);
            $result->bindParam(":f_name", $f_name, PDO::PARAM_STR);
            $result->bindParam(":l_name", $l_name, PDO::PARAM_STR);
            $result->bindParam(":gender", $gender, PDO::PARAM_STR);
            $result->bindParam(":date_of_birth", $date_of_birth, PDO::PARAM_STR);
        
        return $result->execute();
        } 
        catch (PDOException $e) {
            echo "PDO error: ".$e->getMessage();
        
        }
    }
}
