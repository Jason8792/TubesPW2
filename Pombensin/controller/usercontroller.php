<?php

class usercontroller{
    private $userDAO;
    private $memberDAO;
    private $karyawanDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
        $this->memberDAO = new MemberDAO();
        $this->karyawanDAO = new KaryawanDAO();
    }

    public function index() {
        $signInPressed = filter_input(INPUT_POST, 'signin');
        if ($signInPressed) {
            $username = filter_input(INPUT_POST, 'txtusername');
            $password = filter_input(INPUT_POST, 'txtpassword');
            $result = $this->userDAO->login($username);
            if ($result != null && $result->getPassword() == $password) {
                $_SESSION['my_session'] = true;
                $_SESSION['session_user'] = $result->getUsername();
                if ($result->getKodeRef() == 0) {
                    $karyawan = $this->karyawanDAO->logkaryawan($username);
                    $_SESSION['session_job']= $karyawan->getNamaJabatan();
                } else {
                    $_SESSION['session_job'] = 'member';
                }
                header("location:index.php");
            } else {
                echo '<div class="bg-error">Invalid username or password</div>';
            }
        }
        include_once '../view/login.php';
    }
    public function logout(){
        session_unset();
        session_destroy();
        header("location:index.php");
    }
}
?>
