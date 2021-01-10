<?php


class KaryawanDAO {
    public function fetchKaryawanData() {
        $link = PDO_util::createConnection();
        $query = "SELECT k.* , c.nama_cabang FROM karyawan k JOIN cabang c ON k.karyawan_id_cabang=c.id_cabang WHERE NOT k.nama_jabatan = 'Owner' ORDER by k.Rating";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'karyawan');
        PDO_util::closeConnection($link);
        return $result;
    }
    
    public function fetchKaryawanRating() {
        $link = PDO_util::createConnection();
        $query = "SELECT k.* , c.nama_cabang FROM karyawan k JOIN cabang c ON k.karyawan_id_cabang=c.id_cabang WHERE NOT k.nama_jabatan = 'Owner'  ORDER by k.Rating";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'karyawan');
        PDO_util::closeConnection($link);
        return $result;
    }

    /**
     * @param $username
     * @return karyawan
     */
    public function logkaryawan($username) {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM karyawan WHERE username = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('karyawan');
    }

    /**
     * @param $id_karyawan
     * @return karyawan
     */
    public function fetchKaryawan($id_karyawan) {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM karyawan WHERE id_karyawan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_karyawan);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('karyawan');
    }

    public function addKaryawan(karyawan $karyawan) {
        $result = 0;
        $link = PDO_util::createConnection();
        $query = "INSERT into karyawan (nama_karyawan, nama_jabatan, rating, karyawan_id_cabang,username) VALUES (?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $karyawan->getNamaKaryawan());
        $stmt->bindValue(2, $karyawan->getNamaJabatan());
        $stmt->bindValue(3, $karyawan->getRating());
        $stmt->bindValue(4, $karyawan->getKaryawanIdCabang());
        $stmt->bindValue(5,$karyawan->getUsername());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
        return $result;
    }

    public function deleteKaryawan(karyawan $karyawan) {
        $link = PDO_util::createConnection();
        $query = "DELETE FROM karyawan WHERE id_karyawan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $karyawan->getIdKaryawan());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
    }

    public function updateKaryawan(karyawan $karyawan) {
        $link = PDO_util::createConnection();
        $query = "UPDATE karyawan SET nama_karyawan = ?, nama_jabatan = ?, Rating = ?, karyawan_id_cabang = ? WHERE id_karyawan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $karyawan->getNamaKaryawan());
        $stmt->bindValue(2, $karyawan->getNamaJabatan());
        $stmt->bindValue(3, $karyawan->getRating());
        $stmt->bindValue(4, $karyawan->getKaryawanIdCabang());
        $stmt->bindValue(5, $karyawan->getIdKaryawan());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
    }

    public function updateRating(karyawan $karyawan) {
        $link = PDO_util::createConnection();
        $query = "UPDATE karyawan SET rating = ? WHERE id_karyawan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $karyawan->getRating());
        $stmt->bindValue(2, $karyawan->getIdKaryawan());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
    }

    public function karyawanTerbaik() {
        $link = PDO_util::createConnection();
        $query = "SELECT nama_karyawan, Rating, c.nama_cabang as 'nama_cabang' FROM karyawan k JOIN cabang c ON k.karyawan_id_cabang = c.id_cabang WHERE rating = (SELECT MAX(Rating) FROM karyawan)";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'karyawan');
        PDO_util::closeConnection($link);
        return $result;
    }

    public function karyawanTerbaikCabang($id_cabang) {
        $link = PDO_util::createConnection();
        $query = "SELECT nama_karyawan, Rating, c.nama_cabang as 'nama_cabang' FROM karyawan k JOIN cabang c ON k.karyawan_id_cabang = c.id_cabang WHERE rating = (SELECT MAX(Rating) FROM karyawan WHERE karyawan_id_cabang = ". $id_cabang .")";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'karyawan');
        PDO_util::closeConnection($link);
        return $result;
    }
}