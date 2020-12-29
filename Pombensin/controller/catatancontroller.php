<?php
class catatancontroller{
    private $transaksidao;
    public function __construct()
    {
        $this->transaksidao = new TransaksiDAO();
    }

    public function index(){

        $result =$this->transaksidao->transaksiPerbulan();
        include_once '../view/catatan.php';
    }


}