<?php
    class Tracuumuontra extends controller{
        private $muontra;
        private $sv;
        private $sach;
        function __construct(){
            $this->muontra = $this->model('Muontra_m');
            $this->sach = $this->model('Sach_m');
            $this->sv = $this->model('Sinhvien_m');
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
                'page'=>'Tracuumuontra_v',
                'dulieu'=>$this->muontra->TimKiemMuonTra('','','','')
            ]);
        }
        function TimKiem(){
            if(isset($_POST['btnTimKiem'])){
                $mamuon=$_POST['txtMaMuon'];
                $masach=$_POST['txtMaSach'];
                $masv=$_POST['txtMaSV'];
                $tinhtrang=$_POST['txtTinhTrang'];

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuumuontra_v',
                    'dulieu'=>$this->muontra->TimKiemMuonTra($mamuon,$masach,$masv,$tinhtrang),
                    'mamuon'=>$mamuon,
                    'masach'=>$masach,
                    'masv'=>$masv,
                    'tinhtrang'=>$tinhtrang
                ]);
            }
        }
        function Chitiet($mamuon){
            $this->view('MasterLayout_QL',[
                'page'=>'Chitietphieumuon_v',
                'dulieu'=>$this->muontra->TimKiemMuonTra($mamuon,'','',''),
                'info_sach'=>$this->sach->SachMuon($mamuon),
                'info_sv'=>$this->sv->SinhVienMuon($mamuon)
            ]);
        }
        function Chitietphieumuon(){
            if(isset($_POST['btnGiaHan'])){
                $mamuon=$_POST['txtMaMuon'];
                $ngaytramoi=$_POST['txtNgayTraDKNew'];
                $ngaytracu=$_POST['txtNgayTraDK'];
                
                if($ngaytracu>$ngaytramoi){
                    echo '<script>alert("Ngày trả mới phải sau ngày trả cũ!")</script>';
                    $this->view('MasterLayout_QL',[
                        'page'=>'Chitietphieumuon_v',
                        'dulieu'=>$this->muontra->TimKiemMuonTra($mamuon,'','',''),
                        'info_sach'=>$this->sach->SachMuon($mamuon),
                        'info_sv'=>$this->sv->SinhVienMuon($mamuon)
                    ]);
                }
                else{
                    $upd=$this->muontra->GiaHan($mamuon,$ngaytramoi);
                    if($upd){
                        echo '<script>alert("Gia hạn mượn sách thành công!")</script>';
                    }
                    else{
                        echo '<script>alert("Gia hạn mượn sách thất bại!")</script>';
                    }
                }

                $this->view('MasterLayout_QL',[
                    'page'=>'Tracuumuontra_v',
                    'dulieu'=>$this->muontra->TimKiemMuonTra('','','','')
                ]);
            }

            if(isset($_POST['btnTraSach'])){
                $mamuon=$_POST['txtMaMuon'];
                $ngaymuon=$_POST['txtNgayMuon'];
                $masach=$_POST['txtMaSach'];
                
                $upd=$this->muontra->TraSach($mamuon);
                $trasach=$this->sach->TraSach($masach);
                if($upd && $trasach){
                    echo '<script>alert("Trả sách thành công!")</script>';
                    $this->view('MasterLayout_QL',[
                        'page'=>'Tracuumuontra_v',
                        'dulieu'=>$this->muontra->TimKiemMuonTra('','','','')
                    ]);
                }
                else{
                    echo '<script>alert("Trả sách thất bại!")</script>';
                    $this->view('MasterLayout_QL',[
                        'page'=>'Chitietphieumuon_v',
                        'dulieu'=>$this->muontra->TimKiemMuonTra($mamuon,'','',''),
                        'info_sach'=>$this->sach->SachMuon($mamuon),
                        'info_sv'=>$this->sv->SinhVienMuon($mamuon)
                    ]);
                }
            }
        }
    }
?>