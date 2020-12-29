<?php

class bahancontroller{
    private $bahanbakar;
    public function __construct(){
        $this->bahanbakar = new BahanBakarDAO;
    }
    public function index(){
        $result = $this->bahanbakar->showdata();
        include_once '../view/bahanbakar.php';
    }
    public function update(){
        $idbahan = filter_input(INPUT_GET, "idbahan");
        if (isset($idbahan)) {
            $resultupd = $this->bahanbakar->fetchBahanBakar($idbahan);
        }
        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if($submitPressed){
            $hargajual = filter_input(INPUT_POST, "hargajual");
            $hargamodal = filter_input(INPUT_POST, "hargamodal");
            $bahanb= new bahan_bakar();
            $bahanb->setIdBahanBakar($idbahan);
            $bahanb->setHargaJual($hargajual);
            $bahanb->setHargaModal($hargamodal);
            $this->bahanbakar->updateBahanBakar($bahanb);
            header("location:index.php?navito=bahanbakar");
        }
        include_once '../view/bahanbakarupdate.php';

    }



}