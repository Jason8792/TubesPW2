<?php


class bahan_bakar {
    private $id_bahan_bakar;
    private $nama_bahan_bakar;
    private $poin;
    private $harga_modal;
    private $harga_jual;

    /**
     * @return mixed
     */
    public function getIdBahanBakar()
    {
        return $this->id_bahan_bakar;
    }

    /**
     * @param mixed $id_bahan_bakar
     */
    public function setIdBahanBakar($id_bahan_bakar)
    {
        $this->id_bahan_bakar = $id_bahan_bakar;
    }

    /**
     * @return mixed
     */
    public function getNamaBahanBakar()
    {
        return $this->nama_bahan_bakar;
    }

    /**
     * @param mixed $nama_bahan_bakar
     */
    public function setNamaBahanBakar($nama_bahan_bakar)
    {
        $this->nama_bahan_bakar = $nama_bahan_bakar;
    }

    /**
     * @return mixed
     */
    public function getPoin()
    {
        return $this->poin;
    }

    /**
     * @param mixed $poin
     */
    public function setPoin($poin)
    {
        $this->poin = $poin;
    }

    /**
     * @return mixed
     */
    public function getHargaModal()
    {
        return $this->harga_modal;
    }

    /**
     * @param mixed $harga_modal
     */
    public function setHargaModal($harga_modal)
    {
        $this->harga_modal = $harga_modal;
    }

    /**
     * @return mixed
     */
    public function getHargaJual()
    {
        return $this->harga_jual;
    }

    /**
     * @param mixed $harga_jual
     */
    public function setHargaJual($harga_jual)
    {
        $this->harga_jual = $harga_jual;
    }
}