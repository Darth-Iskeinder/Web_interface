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
    
    const SHOW_BY_DEFAULT = 2;


    //Returns all users
    
    public static function getUsersList($count = self::SHOW_BY_DEFAULT, $page = 1) 
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page - 1) * $count;
        
        $db = Db::getConnection();
        
        $usersList = array();
        
        $result = $db->query("SELECT id, login, f_name, l_name FROM users ORDER BY id DESC LIMIT $count OFFSET $offset");
        
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
    public static function getTotalUsers() 
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM users');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['count'];
    }
}
