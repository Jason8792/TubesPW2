<?php


class TransaksiDAO {
    public function addTransaksi(transaksi $transaksi) {
        $result = 0;
        $link = PDO_util::createConnection();
        $query = "INSERT into transaksi (tanggal_transaksi, jumlah_harga, id_member, id_barang, id_cabang) VALUES (?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $transaksi->getTanggalTransaksi());
        $stmt->bindValue(2, $transaksi->getJumlahHarga());
        $stmt->bindValue(3, $transaksi->getIdMember());
        $stmt->bindValue(4, $transaksi->getIdBarang());
        $stmt->bindValue(5, $transaksi->getIdCabang());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDO_util::closeConnection($link);
        return $result;
    }

    public function transaksiPerbulan() {
        $link = PDO_util::createConnection();
        $query = "SELECT COUNT(jumlah_harga) FROM transaksi";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Album');
        PDO_util::closeConnection($link);
        return $result;
    }

    /**
     * @param $id_cabang
     * @return transaksi
     */
    public function transaksiPerbulanCabang($id_cabang) {
        $link = PDO_util::createConnection();
        $query = "SELECT COUNT(jumlah_harga) FROM transaksi WHERE id_cabang = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_cabang);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDO_util::closeConnection($link);
        return $stmt->fetchObject('transaksi');
    }
}