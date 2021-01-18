<?php
ob_start();
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
            $nomormotor= filter_input(INPUT_POST,'nomormotor');
            $nomormobil= filter_input(INPUT_POST,'nomormobil');
            if($nomormotor==""){
                $nomormotor=null;
            }
            if($nomormobil==""){
                $nomormobil=null;
            }
            $mem= new member();
            $mem->setNamaMember($nama);
            $mem->setEmail($email);
            $mem->setUsername($username);
            $mem->setTanggalUlangTahun($ulangtahun);
            $mem->setPoin(0);
            $mem->setNomorMotor($nomormotor);
            $mem->setNomorMobil($nomormobil);
            $mem->setKadaluarsa('0000-00-00');
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
            $nomormobil= filter_input(INPUT_POST, "nomormobil");
            $nomormotor= filter_input(INPUT_POST, "nomormotor");
            
            
            $updmem = new member();
            $updmem->setNamaMember($nama);
            $updmem->setPoin($poin);
            $updmem->setTanggalUlangTahun($tgllahir);
            $updmem->setKadaluarsa($kadaluarsa);
            $updmem->setEmail($email);
            $updmem->setNomorMobil($nomormobil);
            $updmem->setNomorMotor($nomormotor);
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

    public function remember(){

        $data = $this->member->fetchMemberData();

        foreach ($data as $row) {

            if (date('Y-m-d') == date('Y-m-d', strtotime("-1 month", strtotime($row->getKadaluarsa())))) {

                require 'view/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                $mail->SMTPDebug = 4;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp1.gmail.com;';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '1872038@maranatha.ac.id';                 // SMTP username
                $mail->Password = 'Kwakkwakkwak888';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom('1872038@maranatha.ac.id', 'Pom Bensin');
                $mail->addAddress($row->getEmail());     // Add a recipient
                $mail->addReplyTo('1872038@maranatha.ac.id');
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Batas Tegang Poin';
                $mail->Body = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'Sebentar lagi tegang poin anda akan habis dalam waktu 1 bulan segera gunakan';

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }

    }

}