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
            $idBarang = filter_input(INPUT_POST, 'idBarang');
            $idCabang = filter_input(INPUT_POST, 'idCabang');
            $pakaiPoin = filter_input(INPUT_POST, 'pakaiPoin');
            if ($idMember == '') {
                $idMember = null;
                $pakaiPoin = 'false';
            } else {
                $member = $this->memberDAO->fetchMember($idMember);
                $barang = $this->barangDAO->fetchBahanBakar($idBarang);
                $poin = ($totalHarga / $barang->getHargaJual()) * $barang->getPoin();
                $time = date("Y-m-d");
                $kadaluarsa = date("Y-m-d", strtotime("+2 month", $time));
                $member->setPoin($poin);
                $member->setKadaluarsa($kadaluarsa);
                $this->memberDAO->updateMember($member);
            }
            if ($pakaiPoin == 'true' && $member->getPoin() >= 150) {
                $member = $this->memberDAO->fetchMember($idMember);
                $poin = $member->getPoin() - 150;
                $member->setPoin($poin);
                $this->memberDAO->updateMember($member);
                $totalHarga = $totalHarga - 10000;
            }
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