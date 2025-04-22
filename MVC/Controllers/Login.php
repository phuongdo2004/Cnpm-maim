<?php
    class Login extends controller{
        private $sv;
        function __construct(){
            $this->sv = $this->model('Sinhvien_m');
        }
        function Get_data(){
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['maSV'])){
                unset($_SESSION['maSV']);
            }
            $this->view('Login_SV',[
            ]);
        }
        function Logging(){
            if(isset($_POST['btnDangNhap'])){
                $masv=$_POST['txtMaSV'];
                $mk=$_POST['txtMatKhau'];

                $check=$this->sv->CheckDangNhap($masv,$mk);
                if(!$check){
                    echo '<script>alert("Vui lòng kiểm tra lại thông tin đăng nhập!")</script>';
                    $this->view('Login_SV',[
                    ]);
                }
                else{
                    $_SESSION['maSV']=$masv;
                    $this->view('MasterLayout_SV',[
                        'page'=>'Home_v'
                    ]);
                }
            }
        }
    }
?>