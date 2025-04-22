<?php
    class Tracuusach extends controller{
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
                'page'=>'Tracuusach_v',
                'dulieu'=>$this->sach->TimKiemSach('','','','','')
            ]);
        }

        function Timkiem(){
            if(isset($_POST['btnTimKiem'])){
                $masach=$_POST['txtMaSach'];
                $tensach=$_POST['txtTenSach'];
                $tacgia=$_POST['txtTacGia'];
                $nxb=$_POST['txtNXB'];
                $theloai=$_POST['txtTheLoai'];

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuusach_v',
                    'dulieu'=>$this->sach->TimKiemSach($masach,$tensach,$tacgia,$nxb,$theloai),
                    'masach'=>$masach,
                    'tensach'=>$tensach,
                    'tacgia'=>$tacgia,
                    'nxb'=>$nxb,
                    'theloai'=>$theloai,
                ]);
            }
        }

        function Chinhsua($masach){
            $this->view('MasterLayout_QL',[
                'page'=>'Chinhsuasach_v',
                'dulieu'=>$this->sach->findSach($masach)
            ]);
        }

        function Capnhat(){
            if(isset($_POST['btnCapNhat'])){
                $masach=$_POST['txtMaSach'];
                $tensach=$_POST['txtTenSach'];
                $tacgia=$_POST['txtTacGia'];
                $nxb=$_POST['txtNXB'];
                $theloai=$_POST['txtTheLoai'];
                $soluong=$_POST['txtSoLuong'];

                $upd=$this->sach->CapNhatSach($masach,$tensach,$tacgia,$nxb,$theloai,$soluong);
                if($upd){
                    echo '<script>alert("Cập nhật thông tin sách thành công!")</script>';
                }
                else{
                    echo '<script>alert("Cập nhật thông tin sách thất bại!")</script>';
                }

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuusach_v',
                    'dulieu'=>$this->sach->TimKiemSach('','','','','')
                ]);
            }

            if(isset($_POST['btnXoa'])){
                $masach=$_POST['txtMaSach'];

                $del=$this->sach->XoaSach($masach);
                if($del){
                    echo '<script>alert("Xoá sách thành công!")</script>';
                }
                else{
                    echo '<script>alert("Xoá sách thất bại!")</script>';
                }

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuusach_v',
                    'dulieu'=>$this->sach->TimKiemSach('','','','','')
                ]);
            }
        }
    }
?>