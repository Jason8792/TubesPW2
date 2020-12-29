<?php


class CabangDAO {
    /**
     * @param $id_cabang
     * @return cabang
     */
    public function fetchCabang($id_cabang) {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM cabang WHERE id_cabang = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_cabang);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('cabang');
    }

    public function fetchCabangData(){
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM cabang";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'cabang');
        PDO_util::closeConnection($link);
        return $result;
    }
}