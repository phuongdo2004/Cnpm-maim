<?php
    class Tracuusinhvien extends controller{
        private $sv;
        function __construct(){
            $this->sv=$this->model('Sinhvien_m');
        }

        function Get_data(){
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if(!isset($_SESSION['maSV'])){
                $this->view('Login_QLQL',[
                ]);
                exit();
            }
            $this->view('MasterLayout_QL',[
                'page'=>'Tracuusinhvien_v',
                'dulieu'=>$this->sv->TimKiemSinhVien('','','','')
            ]);
        }

        function Timkiem(){
            if(isset($_POST['btnTimKiem'])){
                $masv=$_POST['txtMaSV'];
                $tensv=$_POST['txtTenSV'];
                $email=$_POST['txtEmail'];
                $sdt=$_POST['txtSoDienThoai'];

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuusinhvien_v',
                    'dulieu'=>$this->sv->TimKiemSinhVien($masv,$tensv,$email,$sdt),
                    'masv'=>$masv,
                    'tensv'=>$tensv,
                    'email'=>$email,
                    'sdt'=>$sdt
                ]);
            }
        }

        function Chitietsinhvien($masv){
            $this->view('MasterLayout_QL',[
                'page'=>'Capnhatsinhvien_v',
                'dulieu'=>$this->sv->findSV($masv)
            ]);
        }

        function Thongtinchitiet(){
            if(isset($_POST['btnCapNhat'])){
                $masv=$_POST['txtMaSV'];
                $tensv=$_POST['txtTenSV'];
                $ngaysinh=$_POST['txtNgaySinh'];
                $email=$_POST['txtEmail'];
                $sdt=$_POST['txtSoDienThoai'];
                $mk=$_POST['txtMatKhau'];

                $upd=$this->sv->CapNhatSinhVien($masv,$tensv,$ngaysinh,$email,$sdt,$mk);
                if($upd){
                    echo '<script>alert("Cập nhật thông tin sinh viên thành công!")</script>';
                }
                else{
                    echo '<script>alert("Cập nhật thông tin sinh viên thất bại!")</script>';
                }

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuusinhvien_v',
                    'dulieu'=>$this->sv->TimKiemSinhVien('','','','')
                ]);
            }

            if(isset($_POST['btnXoa'])){
                $masv=$_POST['txtMaSV'];

                $del=$this->sv->XoaSinhVien($masv);
                if($del){
                    echo '<script>alert("Xoá tài khoản thành công!")</script>';
                }
                else{
                    echo '<script>alert("Xoá tài khoản thất bại!")</script>';
                }

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuusinhvien_v',
                    'dulieu'=>$this->sv->TimKiemSinhVien('','','','')
                ]);
            }
        }
    }
?>