<?php
class member{
    private $id_member;
    private $nama_member;
    private $poin;
    private $tanggal_ulang_tahun;
    private $kadaluarsa;
    private $email;
    private $username;
    private $nomor_mobil;
    private $nomor_motor;

    /**
     * @param mixed $nomor_motor
     */
    public function setNomorMotor($nomor_motor){
        $this->nomor_motor = $nomor_motor;
    }

    /**
     * @return mixed
     */
    public function getNomorMotor(){
        return $this->nomor_motor;
    }

    /**
     * @param mixed $nomor_mobil
     */
    public function setNomorMobil($nomor_mobil){
        $this->nomor_mobil = $nomor_mobil;
    }

    /**
     * @return mixed
     */
    public function getNomorMobil(){
        return $this->nomor_mobil;
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
}