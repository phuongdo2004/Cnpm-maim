<?php
    class BookSearch extends controller{
        private $sach;
        function __construct(){
            $this->sach = $this->model('Sach_m');
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
                'page'=>'BookSearch_v',
                'dulieu'=>$this->sach->TimKiemSach('','','','','')
            ]);
        }
        function Searching(){
            if(isset($_POST['btnTimKiem'])){
                $masach=$_POST['txtMaSach'];
                $tensach=$_POST['txtTenSach'];
                $tacgia=$_POST['txtTacGia'];
                $nxb=$_POST['txtNXB'];
                $theloai=$_POST['txtTheLoai'];

                $this->view('MasterLayout_SV',[
                    'page'=>'BookSearch_v',
                    'dulieu'=>$this->sach->TimKiemSach($masach,$tensach,$tacgia,$nxb,$theloai),
                    'masach'=>$masach,
                    'tensach'=>$tensach,
                    'tacgia'=>$tacgia,
                    'nxb'=>$nxb,
                    'theloai'=>$theloai,
                ]);
            }
        }
    }
?>