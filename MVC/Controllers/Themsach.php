<?php
    class Themsach extends controller{
        private $sach;
        function __construct(){
            $this->sach = $this->model('Sach_m');
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
                'page'=>'Themsach_v'
            ]);
        }

        function Themmoi(){
            if(isset($_POST['btnThem'])){
                $masach=$_POST['txtMaSach'];
                $tensach=$_POST['txtTenSach'];
                $tacgia=$_POST['txtTacGia'];
                $nxb=$_POST['txtNXB'];
                $theloai=$_POST['txtTheLoai'];
                $soluong=$_POST['txtSoLuong'];

                $checkma=$this->sach->CheckMaSach($masach);
                if($checkma){
                    echo '<script>alert("Mã sách đã tồn tại!")</script>';
                }
                else{
                    $ins=$this->sach->ThemSach($masach,$tensach,$tacgia,$nxb,$theloai,$soluong);
                    if($ins){
                        echo '<script>alert("Thêm mới sách thành công!")</script>'; 
                    }
                    else{
                        echo '<script>alert("Thêm mới sách thất bại!")</script>'; 
                    }
                }
                $this->view('MasterLayout_QL',[
                    'page'=>'Themsach_v',
                    'masach'=>$masach,
                    'tensach'=>$tensach,
                    'tacgia'=>$tacgia,
                    'nxb'=>$nxb,
                    'theloai'=>$theloai,
                    'soluong'=>$soluong
                ]);
            }
        }
    }
?>