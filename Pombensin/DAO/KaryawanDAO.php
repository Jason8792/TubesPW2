<?php


class KaryawanDAO {
    public function fetchKaryawanData() {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM karyawan";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'karyawan');
        PDO_util::closeConnection($link);
        return $result;
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
        $query = "INSERT into karyawan (nama_karyawan, nama_jabatan, rating, karyawan_id_cabang) VALUES (?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $karyawan->getNamaKaryawan());
        $stmt->bindValue(2, $karyawan->getNamaJabatan());
        $stmt->bindValue(3, $karyawan->getRating());
        $stmt->bindValue(4, $karyawan->getKaryawanIdCabang());
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
        $query = "UPDATE karyawan SET nama_karyawan = ?, nama_jabatan = ?, rating = ?, karyawan_id_cabang = ? WHERE id_karyawan = ?";
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
        $query = "SELECT * FROM karyawan HAVING MAX(rating)";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Album');
        PDO_util::closeConnection($link);
        return $result;
    }

    /**
     * @param $id_cabang
     * @return karyawan
     */
    public function karyawanTerbaikCabang($id_cabang) {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM karyawan HAVING MAX(rating) WHERE karyawan_id_cabang = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_cabang);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('karyawan');
    }
}