<?php
class member{
    private $id_member;
    private $nama_member;
    private $poin;
    private $tanggal_ulang_tahun;
    private $kadaluarsa;
    private $email;
    private $usernamemember;

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
    public function getNamaMember()
    {
        return $this->nama_member;
    }

    /**
     * @param mixed $nama_member
     */
    public function setNamaMember($nama_member)
    {
        $this->nama_member = $nama_member;
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
    public function getTanggalUlangTahun()
    {
        return $this->tanggal_ulang_tahun;
    }

    /**
     * @param mixed $tanggal_ulang_tahun
     */
    public function setTanggalUlangTahun($tanggal_ulang_tahun)
    {
        $this->tanggal_ulang_tahun = $tanggal_ulang_tahun;
    }

    /**
     * @return mixed
     */
    public function getKadaluarsa()
    {
        return $this->kadaluarsa;
    }

    /**
     * @param mixed $kadaluarsa
     */
    public function setKadaluarsa($kadaluarsa)
    {
        $this->kadaluarsa = $kadaluarsa;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsernamemember()
    {
        return $this->usernamemember;
    }

    /**
     * @param mixed $usernamemember
     */
    public function setUsernamemember($usernamemember)
    {
        $this->usernamemember = $usernamemember;
    }
}