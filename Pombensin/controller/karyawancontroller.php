<?php

class karyawancontroller{
    private $cabangdao;
    private $karyawandao;

    public function __construct()
    {
        $this->cabangdao = new CabangDAO;
        $this->karyawandao= new KaryawanDAO;

    }

    public function index(){
        $command = filter_input(INPUT_GET,'cmd');
        if(isset($command)&&$command=="del"){
            $idkaryawan = filter_input(INPUT_GET,"idkaryawan");
            $delkar = new karyawan();
            $delkar->setIdKaryawan($idkaryawan);
            $this->karyawandao->deleteKaryawan($delkar);
            header("location:index.php?navito=editkaryawan");
        }

//      nambah data karyawan
        $submit = filter_input(INPUT_POST,"btnSubmit");
        if(isset($submit)){
            $nama= filter_input(INPUT_POST,"namakaryawan");
            $jabatan= filter_input(INPUT_POST,"namajabatan");
            $username= filter_input(INPUT_POST,"username");
            $cabang= filter_input(INPUT_POST,"idcabang");
            $karyawan = new karyawan();
            $karyawan->setNamaKaryawan($nama);
            $karyawan->setNamaJabatan($jabatan);
            $karyawan->setUsername($username);
            $karyawan->setKaryawanIdCabang($cabang);
            $karyawan->setRating(0);
            $this->karyawandao->addKaryawan($karyawan);
        }

        $result = $this->karyawandao->fetchKaryawanData();
        $result2 = $this->cabangdao->fetchCabangData();
        include_once '../view/editkaryawan.php';
    }
    public function editkaryawan(){
        $idkaryawan = filter_input(INPUT_GET,'idkaryawan');
        if(isset($idkaryawan)){
            $resultupd = $this->karyawandao->fetchKaryawan($idkaryawan);
        }
        $submitupd = filter_input(INPUT_POST,"updbtnSubmit");
        $result2 = $this->cabangdao->fetchCabangData();
        if($submitupd){
            $nama= filter_input(INPUT_POST,'updnamakaryawan');
            $jabatan = filter_input(INPUT_POST,'updnamajabatan');
            $username = filter_input(INPUT_POST,'updusername');
            $rating = filter_input(INPUT_POST,'updrating');
            $idcabang = filter_input(INPUT_POST,'updidcabang');
            $updkaryawan = new karyawan();
            $updkaryawan->setIdKaryawan($idkaryawan);
            $updkaryawan->setNamaKaryawan($nama);
            $updkaryawan->setNamaJabatan($jabatan);
            $updkaryawan->setUsername($username);
            $updkaryawan->setRating($rating);
            $updkaryawan->setKaryawanIdCabang($idcabang);
            $this->karyawandao->updateKaryawan($updkaryawan);
            header("location:index.php?navito=editkaryawan");
        }
        include_once '../view/update_karyawan.php';
    }


}



