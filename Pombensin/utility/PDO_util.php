<?php

    class PDO_util{
        public static function createConnection(){
            $link = new PDO("mysql:host=localhost; dbname=pombensin","root","");
            $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
            $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $link;
        }

        public static function closeConnection(PDO $link){
            if($link !=null){
                $link=null;
            }
        }
    }
?>