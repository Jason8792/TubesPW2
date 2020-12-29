<?php


class karyawan {
    private $id_karyawan;
    private $nama_karyawan;
    private $nama_jabatan;
    private $Rating;
    private $username;
    private $karyawan_id_cabang;
    private $nama_cabang;


    /**
     * @return mixed
     */
    public function getIdKaryawan()
    {
        return $this->id_karyawan;
    }

    /**
     * @param mixed $id_karyawan
     */
    public function setIdKaryawan($id_karyawan)
    {
        $this->id_karyawan = $id_karyawan;
    }

    /**
     * @return mixed
     */
    public function getNamaKaryawan()
    {
        return $this->nama_karyawan;
    }

    /**
     * @param mixed $nama_karyawan
     */
    public function setNamaKaryawan($nama_karyawan)
    {
        $this->nama_karyawan = $nama_karyawan;
    }

    /**
     * @return mixed
     */
    public function getNamaJabatan()
    {
        return $this->nama_jabatan;
    }

    /**
     * @param mixed $nama_jabatan
     */
    public function setNamaJabatan($nama_jabatan)
    {
        $this->nama_jabatan = $nama_jabatan;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->Rating;
    }

    /**
     * @param mixed $Rating
     */
    public function setRating($Rating)
    {
        $this->Rating = $Rating;
    }

    /**
     * @return mixed
     */
    public function getKaryawanIdCabang()
    {
        return $this->karyawan_id_cabang;
    }

    /**
     * @param mixed $karyawan_id_cabang
     */
    public function setKaryawanIdCabang($karyawan_id_cabang)
    {
        $this->karyawan_id_cabang = $karyawan_id_cabang;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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