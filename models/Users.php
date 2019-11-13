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
    
    public static function getUsersList($page = 1) 
    {
        
        $page = intval($page);
        $offset = ($page - 1) * 2;
        
        $db = Db::getConnection();
        
        $usersList = array();
        
        $result = $db->query("SELECT id, login, f_name, l_name FROM users ORDER BY id DESC LIMIT 2 OFFSET $offset");
        
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
    
    //Get total amount of users in database
    public static function getTotalUsers() 
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM users');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['count'];
    }
}
