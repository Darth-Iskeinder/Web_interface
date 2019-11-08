<?php


class Users {
    //Return single user by id
    public static function getUsersById($id) 
    {
        $id = intval($id);
        
        if ($id) {
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * from users WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $users = $result->fetch();
            
            return $users;
        }
        
        
    }
    
    //Returns all users
    public static function getUsersList() 
    {
        $db = Db::getConnection();
        
        $usersList = array();
        
        $result = $db->query('SELECT id, login, f_name, l_name FROM users');
        
        $i=0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['login'] = $row['login'];
            $usersList[$i]['f_name'] = $row['f_name'];
            $usersList[$i]['l_name'] = $row['l_name'];
            $i++;
        }
        return $usersList;
    }
}
