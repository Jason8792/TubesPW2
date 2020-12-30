<?php


class transaksiController {
    private $transaksiDAO;
    private $memberDAO;
    private $barangDAO;
    private $cabangDAO;

    public function __construct() {
        $this->transaksiDAO = new TransaksiDAO();
        $this->memberDAO = new MemberDAO();
        $this->barangDAO = new BahanBakarDAO();
        $this->cabangDAO = new CabangDAO();
    }

    public function index() {
        $submit = filter_input(INPUT_POST,"btnSubmit");
        if(isset($submit)){
            $tanggal = filter_input(INPUT_POST, 'tanggal');
            $totalHarga = filter_input(INPUT_POST, 'totalHarga');
            $idMember = filter_input(INPUT_POST, 'idMember');
            if ($idMember == '') {
                $idMember = null;
            }
            $idBarang = filter_input(INPUT_POST, 'idBarang');
            $idCabang = filter_input(INPUT_POST, 'idCabang');
            $transaksi = new transaksi();
            $transaksi->setTanggalTransaksi($tanggal);
            $transaksi->setJumlahHarga($totalHarga);
            $transaksi->setIdMember($idMember);
            $transaksi->setIdBarang($idBarang);
            $transaksi->setIdCabang($idCabang);
            $this->transaksiDAO->addTransaksi($transaksi);
        }
        $resultMember = $this->memberDAO->fetchMemberData();
        $resultBarang = $this->barangDAO->showdata();
        $resultCabang = $this->cabangDAO->fetchCabangData();
        include_once '../view/transaksi.php';
    }
}