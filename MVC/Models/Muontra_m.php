<?php
    class Muontra_m extends connectDB{
        function ThemPhieuMuon($mamuon,$masach,$masv,$ngaymuon,$ngaytradk){
            $sql="INSERT INTO phieumuon VALUES ('$mamuon','$masach','$masv','$ngaymuon','$ngaytradk','0000-00-00','Đang mượn')";
            return mysqli_query($this->con,$sql);
        }
        function CheckPhieuMuon($mamuon){
            $sql="SELECT * FROM phieumuon WHERE maMuon='$mamuon'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }
        function TimKiemMuonTra($mamuon,$masach,$masv,$tinhtrang){
            $sql="SELECT *, DATE_FORMAT(ngayMuon, '%d/%m/%Y') AS FngayMuon, DATE_FORMAT(ngayTraTT, '%d/%m/%Y') AS FngayTraTT, DATE_FORMAT(ngayTraDK, '%d/%m/%Y') AS FngayTraDK FROM phieumuon WHERE maMuon LIKE '%$mamuon%' AND maSach LIKE '%$masach%' AND maSV LIKE '%$masv%'";
            if($tinhtrang == "Conhan"){
                $sql="SELECT *, DATE_FORMAT(ngayMuon, '%d/%m/%Y') AS FngayMuon, DATE_FORMAT(ngayTraTT, '%d/%m/%Y') AS FngayTraTT, DATE_FORMAT(ngayTraDK, '%d/%m/%Y') AS FngayTraDK FROM phieumuon WHERE maMuon LIKE '%$mamuon%' AND maSach LIKE '%$masach%' AND maSV LIKE '%$masv%' AND trangThai = 'Đang mượn' AND ngayTraDK >= CURRENT_DATE()";
            }
            if($tinhtrang == "Quahan"){
                $sql="SELECT *, DATE_FORMAT(ngayMuon, '%d/%m/%Y') AS FngayMuon, DATE_FORMAT(ngayTraTT, '%d/%m/%Y') AS FngayTraTT, DATE_FORMAT(ngayTraDK, '%d/%m/%Y') AS FngayTraDK FROM phieumuon WHERE maMuon LIKE '%$mamuon%' AND maSach LIKE '%$masach%' AND maSV LIKE '%$masv%' AND trangThai = 'Đang mượn' AND ngayTraDK < CURRENT_DATE()";
            }
            if($tinhtrang == "Datra"){
                $sql="SELECT *, DATE_FORMAT(ngayMuon, '%d/%m/%Y') AS FngayMuon, DATE_FORMAT(ngayTraTT, '%d/%m/%Y') AS FngayTraTT, DATE_FORMAT(ngayTraDK, '%d/%m/%Y') AS FngayTraDK FROM phieumuon WHERE maMuon LIKE '%$mamuon%' AND maSach LIKE '%$masach%' AND maSV LIKE '%$masv%' AND trangThai = 'Đã trả'";
            }
            return mysqli_query($this->con,$sql);
        }
        function GiaHan($mamuon,$ngaytramoi){
            $sql="UPDATE phieumuon SET ngayTraDK='$ngaytramoi' WHERE maMuon='$mamuon'";
            return mysqli_query($this->con,$sql);
        }
        function TraSach($mamuon){
            $sql="UPDATE phieumuon SET ngayTraTT=CURRENT_DATE(), trangThai='Đã trả' WHERE maMuon='$mamuon'";
            return mysqli_query($this->con,$sql);
        }
    }
?>