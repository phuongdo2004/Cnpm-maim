<?php
    class Sach_m extends connectDB{
        function ThemSach($masach,$tensach,$tacgia,$nxb,$theloai,$soluong){
            $sql="INSERT INTO sach VALUES ('$masach','$tensach','$tacgia','$nxb','$theloai','$soluong')";
            return mysqli_query($this->con,$sql);
        }
        function CheckMaSach($masach){
            $sql="SELECT * FROM sach WHERE maSach='$masach'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }
        function CheckSoLuong($masach){
            $sql="SELECT * FROM sach WHERE maSach='$masach' AND soLuong>0";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }
        function MuonSach($masach){
            $sql="UPDATE sach SET soLuong=soLuong-1 WHERE maSach='$masach'";
            return mysqli_query($this->con,$sql);
        }
        function TraSach($masach){
            $sql="UPDATE sach SET soLuong=soLuong+1 WHERE maSach='$masach'";
            return mysqli_query($this->con,$sql);
        }
        function TimKiemSach($masach,$tensach,$tacgia,$nxb,$theloai){
            $sql="SELECT * FROM sach WHERE maSach LIKE '%$masach%' AND tenSach LIKE '%$tensach%' AND tacGia LIKE '%$tacgia%' AND nhaXuatBan LIKE '%$nxb%' AND theLoai LIKE '%$theloai%'";
            return mysqli_query($this->con,$sql);
        }
        function findSach($masach){
            $sql="SELECT * FROM sach WHERE maSach='$masach'";
            return mysqli_query($this->con,$sql);
        }
        function SachMuon($mamuon){
            $sql="SELECT * FROM sach WHERE maSach IN (SELECT maSach FROM phieumuon WHERE maMuon='$mamuon')";
            return mysqli_query($this->con,$sql);
        }
        function CapNhatSach($masach,$tensach,$tacgia,$nxb,$theloai,$soluong){
            $sql="UPDATE sach SET tenSach='$tensach', tacGia='$tacgia', nhaXuatBan='$nxb', theLoai='$theloai', soLuong='$soluong' WHERE maSach='$masach'";
            return mysqli_query($this->con,$sql);
        }
        function XoaSach($masach){
            $sql="DELETE FROM sach WHERE maSach='$masach'";
            return mysqli_query($this->con,$sql);
        }
    }
?>