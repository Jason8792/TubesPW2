<?php


class karyawan {
    private $id_karyawan;
    private $nama_karyawan;
    private $nama_jabatan;
    private $rating;
    private $usernamekaryawan;
    private $karyawan_id_cabang;

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
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
    public function getUsernamekaryawan()
    {
        return $this->usernamekaryawan;
    }

    /**
     * @param mixed $usernamekaryawan
     */
    public function setUsernamekaryawan($usernamekaryawan)
    {
        $this->usernamekaryawan = $usernamekaryawan;
    }
}