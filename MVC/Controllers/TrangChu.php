<?php 
    class TrangChu extends controller{
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
                'page'=>'TrangChu_v'
            ]);
        }
    }
?>