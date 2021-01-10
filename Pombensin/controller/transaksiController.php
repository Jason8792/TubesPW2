<?php
ob_start();

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
            $tanggal = date("Y-m-d");
            $totalHarga = filter_input(INPUT_POST, 'totalharga');
            $idMember = filter_input(INPUT_POST, 'idMember');
            $idBarang = filter_input(INPUT_POST, 'idBarang');
            $idCabang = filter_input(INPUT_POST, 'idCabang');
            $pakaiPoin = filter_input(INPUT_POST, 'pakaiPoin');
            
            $piece=explode("+",$idMember);
            if ($piece[0] == '') {
                $piece[0] = null;
                $pakaiPoin = 'false';
            }
            else {
                $barang = $this->barangDAO->fetchBahanBakar($idBarang);
                $member = $this->memberDAO->fetchMember($piece[0]);
                
                if($piece[1]=='mobil'){
                    $nomorkendaraan = $member->getNomorMobil();
                }
                else{
                    $nomorkendaraan = $member->getNomorMotor();
                }
                $poin = round(($totalHarga / $barang->getHargaJual()), 0, PHP_ROUND_HALF_UP) * $barang->getPoin();
                if (date('Y-m-d') >= date("Y-m-d", strtotime("-3 day", strtotime($member->getTanggalUlangTahun()))) && date('Y-m-d') <= date("Y-m-d", strtotime("+3 day", strtotime($member->getTanggalUlangTahun())))){
                    $poin = $poin*2 ;
                }
                $time = date("Y-m-d");
                $str = strtotime($time);
                $kadaluarsa = date("Y-m-d", strtotime("+1 year", $str));
                $member->setPoin($poin);
                $member->setKadaluarsa($kadaluarsa);
                $this->memberDAO->updateMember($member);
            if ($pakaiPoin == 'true' && $member->getPoin() >= 150) {
                $member = $this->memberDAO->fetchMember($piece[0]);
                $poin = $member->getPoin() - 150;
                $member->setPoin($poin);
                $this->memberDAO->updateMember($member);
                $totalHarga = $totalHarga - 10000;
            }
        }
            $transaksi = new transaksi();
            $transaksi->setTanggalTransaksi($tanggal);
            $transaksi->setJumlahHarga($totalHarga);
            $transaksi->setIdMember($piece[0]);
            $transaksi->setNomorKendaraan($nomorkendaraan);
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