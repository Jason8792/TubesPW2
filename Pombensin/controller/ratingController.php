<?php
ob_start();

class ratingController {
    private $karyawanDAO;

    public function __construct() {
        $this->karyawanDAO = new KaryawanDAO();
    }

    public function index() {
        $submit = filter_input(INPUT_POST,"btnSubmit");
        if(isset($submit)){
            $rating = filter_input(INPUT_POST, 'rating');
            $idKaryawan = filter_input(INPUT_POST, 'idKaryawan');
            $karyawanBefore = $this->karyawanDAO->fetchKaryawan($idKaryawan);
            if($karyawanBefore->getRating() == 0 ){
                $rating = $rating + $karyawanBefore->getRating();
            }
            else{
                $rating = round($rating + $karyawanBefore->getRating() / 2);
            }
            $karyawan = new karyawan();
            $karyawan->setIdKaryawan($idKaryawan);
            $karyawan->setRating($rating);
            $this->karyawanDAO->updateRating($karyawan);
        }
        $resultKaryawan = $this->karyawanDAO->fetchKaryawanRating();
        include_once '../view/rating.php';
    }
}