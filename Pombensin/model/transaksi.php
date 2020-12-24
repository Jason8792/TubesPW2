<?php


class transaksi {
    private $id_transaksi;
    private $tanggal_transaksi;
    private $jumlah_harga;
    private $id_member;
    private $id_barang;
    private $id_cabang;

    /**
     * @return mixed
     */
    public function getIdTransaksi()
    {
        return $this->id_transaksi;
    }

    /**
     * @param mixed $id_transaksi
     */
    public function setIdTransaksi($id_transaksi)
    {
        $this->id_transaksi = $id_transaksi;
    }

    /**
     * @return mixed
     */
    public function getTanggalTransaksi()
    {
        return $this->tanggal_transaksi;
    }

    /**
     * @param mixed $tanggal_transaksi
     */
    public function setTanggalTransaksi($tanggal_transaksi)
    {
        $this->tanggal_transaksi = $tanggal_transaksi;
    }

    /**
     * @return mixed
     */
    public function getJumlahHarga()
    {
        return $this->jumlah_harga;
    }

    /**
     * @param mixed $jumlah_harga
     */
    public function setJumlahHarga($jumlah_harga)
    {
        $this->jumlah_harga = $jumlah_harga;
    }

    /**
     * @return mixed
     */
    public function getIdMember()
    {
        return $this->id_member;
    }

    /**
     * @param mixed $id_member
     */
    public function setIdMember($id_member)
    {
        $this->id_member = $id_member;
    }

    /**
     * @return mixed
     */
    public function getIdBarang()
    {
        return $this->id_barang;
    }

    /**
     * @param mixed $id_barang
     */
    public function setIdBarang($id_barang)
    {
        $this->id_barang = $id_barang;
    }

    /**
     * @return mixed
     */
    public function getIdCabang()
    {
        return $this->id_cabang;
    }

    /**
     * @param mixed $id_cabang
     */
    public function setIdCabang($id_cabang)
    {
        $this->id_cabang = $id_cabang;
    }
}