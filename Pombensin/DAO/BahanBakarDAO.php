<?php


class BahanBakarDAO {
    /**
     * @param $id_bahan_bakar
     * @return bahan_bakar
     */
    public function fetchBahanBakar($id_bahan_bakar) {
        $link = PDO_util::createConnection();
        $query = "SELECT * FROM bahan_bakar WHERE id_bahan_bakar = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_karyawan);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('bahan_bakar');
    }

    public function updateBahanBakar(bahan_bakar $bahan_bakar) {
        $link = PDO_util::createConnection();
        $query = "UPDATE bahan_bakar SET harga_modal = ?, harga_jual = ? WHERE id_karyawan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $bahan_bakar->getHargaModal());
        $stmt->bindValue(2, $bahan_bakar->getHargaJual());
        $stmt->bindValue(3, $bahan_bakar->getIdBahanBakar());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
    }
}