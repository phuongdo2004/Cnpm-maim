<?php
    class Sinhvien_m extends connectDB{
        function ThemSinhVien($masv,$tensv,$ngaysinh,$email,$sdt){
            $sql="INSERT INTO sinhvien VALUES('$masv','$tensv','$ngaysinh','$email','$sdt','$sdt')";
            return mysqli_query($this->con,$sql);
        }

        function CheckMaSV($masv){
            $sql="SELECT * FROM sinhvien WHERE maSV='$masv'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }

        function CheckDangNhap($masv,$mk){
            $sql="SELECT * FROM sinhvien WHERE maSV='$masv' AND matKhau='$mk'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }

        function TimKiemSinhVien($masv,$tensv,$email,$sdt){
            $sql="SELECT *, DATE_FORMAT(ngaySinh, '%d/%m/%Y') AS formattedNgaySinh FROM sinhvien WHERE maSV LIKE '%$masv%' AND tenSV LIKE '%$tensv%' AND email LIKE '%$email%' AND soDienThoai LIKE '%$sdt%' ";
            return mysqli_query($this->con,$sql);
        }

        function findSV($masv){
            $sql="SELECT * FROM sinhvien WHERE maSV='$masv'";
            return mysqli_query($this->con,$sql);
        }

        function SinhVienMuon($mamuon){
            $sql="SELECT * FROM sinhvien WHERE maSV IN (SELECT maSV FROM phieumuon WHERE maMuon='$mamuon')";
            return mysqli_query($this->con,$sql);
        }

        function CapNhatSinhVien($masv,$tensv,$ngaysinh,$email,$sdt,$mk){
            $sql="UPDATE sinhvien SET tenSV='$tensv', ngaySinh='$ngaysinh', email='$email', soDienThoai='$sdt', matKhau='$mk' WHERE maSV='$masv'";
            return mysqli_query($this->con,$sql);
        }

        function XoaSinhVien($masv){
            $sql="DELETE FROM sinhvien WHERE maSV='$masv'";
            return mysqli_query($this->con,$sql);
        }
    }
?>