<?php
    class QuanLy_m extends connectDB{
        function CheckDangNhap($maql,$mk){
            $sql="SELECT * FROM quanly WHERE maQL='$maql' AND matKhau='$mk'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }
    }
?>