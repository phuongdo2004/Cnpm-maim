<?php 
    class Home extends controller{
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
                'page'=>'Home_v'
            ]);
        }

    }
?>