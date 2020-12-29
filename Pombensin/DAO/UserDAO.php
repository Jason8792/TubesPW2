<?php

class UserDAO
{

    public function login($username)
    {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM `user` WHERE Username = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('user');
    }
}
