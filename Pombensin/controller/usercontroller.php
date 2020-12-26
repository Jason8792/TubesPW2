<?php

class usercontroller{
    public function __constuct(){
        $this->user= new UserDAO();
        $this->member= new MemberDAO();
        $this->karyawan= new KaryawanDAO();
    }

    public function login(){
        $signin=filter_input(INPUT_POST,'signin');
        if($signin){
            $username=filter_input(INPUT_POST,'txtusername');
            $password=filter_input(INPUT_POST,'txtpassword');
            $md5password= md5($password);
            $result = $this->user->login($username,$md5password);
            if($result!=null && $result->getUsername()==$username){

                $_SESSION['status']=$result->getStatus();
//                0 = Karyawan , 1 = Member
                if($_SESSION['status']==1){
                    //buat member
                    $log = $this->member->logmember($username);
                    $_SESSION['My_session']=true;
                    $_SESSION['username']=$log->getNamaMember();
                }
                else{
                    // buat karyawan
                    $log = $this->karyawan->logkaryawan($username);
                    $_SESSION['My_session']=true;
                    $_SESSION['username']=$log->getNamaKaryawan();
                }
                header("location:index.php");
            }
            else{
                echo "Username atau Password Salah";
            }
        }
        include_once './login.php';
    }
    public function logout(){
        session_unset();
        session_destroy();
        header("location:index.php");
    }
}
?>
