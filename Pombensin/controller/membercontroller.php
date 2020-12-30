<?php
class membercontroller{
    private $member;

    public function __construct()
    {
        $this->member= new MemberDAO();
    }

    public function index(){
        $command = filter_input(INPUT_GET,'cmd');
        if(isset($command)&&$command){
            $idmember = filter_input(INPUT_GET,"idmember");
            $delmem = new member();
            $delmem->setIdMember($idmember);
            $this->member->deleteMember($delmem);
            header("location:index.php?navito=editmember");
        }

        $submit= filter_input(INPUT_POST,"btnSubmit");
        if(isset($submit)){
            $nama = filter_input(INPUT_POST,'namamember');
            $email = filter_input(INPUT_POST,'email');
            $username = filter_input(INPUT_POST,'username');
            $ulangtahun = filter_input(INPUT_POST,'ulangtahun');
            $mem= new member();
            $mem->setNamaMember($nama);
            $mem->setEmail($email);
            $mem->setUsername($username);
            $mem->setTanggalUlangTahun($ulangtahun);
            $mem->setPoin(0);
            $mem->setKadaluarsa(0000-00-00);
            $this->member->addMember($mem);

        }

        $result = $this->member->fetchMemberData();
        include_once '../view/editmember.php';
    }
    public function update(){
        $idmember = filter_input(INPUT_GET,"idmember");
        if(isset($idmember)){
            $resultupd = $this->member->fetchMember($idmember);
        }
        $submit = filter_input(INPUT_POST,"updbtnSubmit");
        if($submit) {
            $nama = filter_input(INPUT_POST, "updnama");
            $poin = filter_input(INPUT_POST, "updpoin");
            $tgllahir = filter_input(INPUT_POST, "updtanggallahir");
            $kadaluarsa = filter_input(INPUT_POST, "updkadaluarsa");
            $email = filter_input(INPUT_POST, "updemail");

            $updmem = new member();
            $updmem->setNamaMember($nama);
            $updmem->setPoin($poin);
            $updmem->setTanggalUlangTahun($tgllahir);
            $updmem->setKadaluarsa($kadaluarsa);
            $updmem->setEmail($email);
            $updmem->setIdMember($idmember);
            $this->member->updateMember($updmem);
            header("location:index.php?navito=editmember");
        }
        include_once '../view/update_member.php';

    }

    public function showPoin() {
        $resultMember = $this->member->logmember($_SESSION['session_user']);
        include_once '../view/poin.php';
    }
}