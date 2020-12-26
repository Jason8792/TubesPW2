<?php
class UserDAO{
    /**
     * @param $username
     * @param $password
     * @return user
     */
    public function login($username,$password){
        $status = 0;
        $link= PDO_util::createConnection();
        $query = "SELECT * FROM user WHERE Username=? AND password=? ";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$password);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('user');
    }
}
