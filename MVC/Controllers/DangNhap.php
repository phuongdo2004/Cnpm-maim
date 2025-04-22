<?php
    class Login extends controller{
        private $ql;
        function __construct(){
            $this->sv = $this->model('QuanLy_m');
        }
        function Get_data(){
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['maQL'])){
                unset($_SESSION['maQLQL']);
            }
            $this->view('Login_QL',[
            ]);
        }
        function Logging(){
            if(isset($_POST['btnDangNhap'])){
                $maql=$_POST['txtMaQL'];
                $mk=$_POST['txtMatKhau'];

                $check=$this->ql->CheckDangNhap($maql,$mk);
                if(!$check){
                    echo '<script>alert("Vui lòng kiểm tra lại thông tin đăng nhập!")</script>';
                    $this->view('Login_QL',[
                    ]);
                }
                else{
                    $_SESSION['maQL']=$maql;
                    $this->view('MasterLayout_QL',[
                        'page'=>'TrangChu_v'
                    ]);
                }
            }
        }
    }
?>