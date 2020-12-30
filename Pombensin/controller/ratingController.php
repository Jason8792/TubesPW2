<?php


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
            $rating = $rating + $karyawanBefore->getRating();
            $karyawan = new karyawan();
            $karyawan->setIdKaryawan($idKaryawan);
            $karyawan->setRating($rating);
            $this->karyawanDAO->updateRating($karyawan);
        }
        $resultKaryawan = $this->karyawanDAO->fetchKaryawanData();
        include_once '../view/rating.php';
    }
}