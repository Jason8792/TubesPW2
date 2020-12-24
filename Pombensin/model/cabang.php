<?php


class cabang {
    private $id_cabang;
    private $nama_cabang;

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

    /**
     * @return mixed
     */
    public function getNamaCabang()
    {
        return $this->nama_cabang;
    }

    /**
     * @param mixed $nama_cabang
     */
    public function setNamaCabang($nama_cabang)
    {
        $this->nama_cabang = $nama_cabang;
    }
}