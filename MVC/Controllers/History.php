<?php
    class History extends controller{
        private $muontra;
        function __construct(){
            $this->muontra = $this->model('Muontra_m');
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
                'page'=>'History_v',
                'dulieu'=>$this->muontra->TimKiemMuonTra('','','','')
            ]);
        }
        function Searching(){
            if(isset($_POST['btnTimKiem'])){
                $mamuon=$_POST['txtMaMuon'];
                $masach=$_POST['txtMaSach'];
                $masv=$_SESSION['maSV'];
                $tinhtrang=$_POST['txtTinhTrang'];

                $this->view('MasterLayout_SV',[
                    'page'=>'History_v',
                    'dulieu'=>$this->muontra->TimKiemMuonTra($mamuon,$masach,$masv,$tinhtrang),
                    'mamuon'=>$mamuon,
                    'masach'=>$masach,
                    'masv'=>$masv,
                    'tinhtrang'=>$tinhtrang
                ]);
            }
        }
    }
?>