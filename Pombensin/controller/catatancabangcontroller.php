<?php
class catatancabangcontroller{
    private $transaksidao;

    public function __construct()
    {
        $this->transaksidao = new TransaksiDAO();

    }

    public function index(){
        $result = $this->transaksidao->transaksiPerbulanCabang();
        include_once '../view/catatancabang.php';
    }
}