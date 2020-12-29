<?php

class user{
    private $Username;
    private $password;
    private $kode_ref;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getKoderef()
    {
        return $this->kode_ref;
    }

    /**
     * @param mixed $kode_ref
     */
    public function setKoderef($kode_ref)
    {
        $this->kode_ref = $kode_ref;
    }
}
