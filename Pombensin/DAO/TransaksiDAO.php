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
        $query = "SELECT MONTH (tanggal_transaksi) AS 'tanggal_transaksi', SUM(jumlah_harga) as 'jumlah_harga' FROM transaksi GROUP BY month(tanggal_transaksi)";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'transaksi');
        PDO_util::closeConnection($link);
        return $result;
    }

    public function transaksiPerbulanCabang() {
        $link = PDO_util::createConnection();
        $query = "SELECT c.nama_cabang AS 'nama_cabang' ,MONTH (t.tanggal_transaksi) AS 'tanggal_transaksi', SUM(t.jumlah_harga) as 'jumlah_harga' FROM transaksi t JOIN cabang c on t.id_cabang = c.id_cabang GROUP BY month(t.tanggal_transaksi),c.nama_cabang";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'transaksi');
        PDO_util::closeConnection($link);
        return $result;
    }
}