<?php
    class UpdateInfo extends controller{
        private $sv;
        function __construct(){
            $this->sv = $this->model('Sinhvien_m');
        }
        function Get_data(){
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if(!isset($_SESSION['maSV'])){
                $this->view('Login_SV',[
                ]);
                exit();
            }
            $this->view('MasterLayout_SV',[
                'page'=>'UpdateInfo_v',
                'info_sv'=>$this->sv->findSV($_SESSION['maSV'])
            ]);
        }
        function Update(){
            if(isset($_POST['btnCapNhat'])){
                $masv=$_POST['txtMaSV'];
                $tensv=$_POST['txtTenSV'];
                $ngaysinh=$_POST['txtNgaySinh'];
                $email=$_POST['txtEmail'];
                $sdt=$_POST['txtSDT'];
                $mk=$_POST['txtMatKhau'];

                $upd=$this->sv->CapNhatSinhVien($masv,$tensv,$ngaysinh,$email,$sdt,$mk);
                if($upd){
                    echo '<script>alert("Cập nhật thông tin thành công!")</script>';
                }
                else{
                    echo '<script>alert("Cập nhật thông tin thất bại!")</script>';
                }

                $this->view('MasterLayout_SV',[
                    'page'=>'UpdateInfo_v',
                    'info_sv'=>$this->sv->findSV($_SESSION['maSV'])
                ]);
            }
        }
    }
?>