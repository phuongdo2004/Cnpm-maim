<?php
    class Dangkymuonsach extends controller{
        private $sv;
        private $sach;
        private $muontra;

        function __construct(){
            $this->sv = $this->model('Sinhvien_m');
            $this->sach = $this->model('Sach_m');
            $this->muontra = $this->model('Muontra_m');
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
                'page'=>'Dangkymuonsach_v'
            ]);
        }

        function Muonsach(){
            if(isset($_POST['btnTimSach']) || isset($_POST['btnTimSV'])){
                $masach=$_POST['txtMaSach'];
                $masv=$_POST['txtMaSV'];
                $mamuon=$_POST['txtMaMuon'];
                $ngaymuon=$_POST['txtNgayMuon'];
                $ngaytradk=$_POST['txtNgayTraDK'];

                $checksach=$this->sach->CheckMaSach($masach);
                $checksv=$this->sv->CheckMaSV($masv);

                if(empty($masach)){
                    $checksach=true;
                }
                if(empty($masv)){
                    $checksv=true;
                }

                if($checksach && $checksv){
                    $this->view('MasterLayout_QL',[
                        'page'=>'Dangkymuonsach_v',
                        'info_sach'=>$this->sach->findSach($masach),
                        'info_sv'=>$this->sv->findSV($masv),
                        'mamuon'=>$mamuon,
                        'ngaymuon'=>$ngaymuon,
                        'ngaytradk'=>$ngaytradk
                    ]);  
                }
                if($checksach && !$checksv){
                    $this->view('MasterLayout_QL',[
                        'page'=>'Dangkymuonsach_v',
                        'info_sach'=>$this->sach->findSach($masach),
                        'sv-null'=>"NoInfo",
                        'mamuon'=>$mamuon,
                        'ngaymuon'=>$ngaymuon,
                        'ngaytradk'=>$ngaytradk
                    ]);  
                }
                if(!$checksach && $checksv){
                    $this->view('MasterLayout_QL',[
                        'page'=>'Dangkymuonsach_v',
                        'sach-null'=>"NoInfo",
                        'info_sv'=>$this->sv->findSV($masv),
                        'mamuon'=>$mamuon,
                        'ngaymuon'=>$ngaymuon,
                        'ngaytradk'=>$ngaytradk
                    ]);  
                }
                if(!$checksach && !$checksv){
                    $this->view('MasterLayout_QL',[
                        'page'=>'Dangkymuonsach_v',
                        'sach-null'=>"NoInfo",
                        'sv-null'=>"NoInfo",
                        'mamuon'=>$mamuon,
                        'ngaymuon'=>$ngaymuon,
                        'ngaytradk'=>$ngaytradk
                    ]);  
                }
            }

            if(isset($_POST['btnMuon'])){
                $masach=$_POST['txtMaSach'];
                $masv=$_POST['txtMaSV'];
                $mamuon=$_POST['txtMaMuon'];
                $ngaymuon=$_POST['txtNgayMuon'];
                $ngaytradk=$_POST['txtNgayTraDK'];

                if(empty($masach) || empty($masv) || empty($mamuon) || empty($ngaymuon) || empty($ngaytradk)){
                    echo '<script>alert("Vui lòng điền đầy đủ thông tin!")</script>';
                    $this->view('MasterLayout_QL',[
                        'page'=>'Dangkymuonsach_v',
                        'info_sach'=>$this->sach->findSach($masach),
                        'info_sv'=>$this->sv->findSV($masv),
                        'mamuon'=>$mamuon,
                        'ngaymuon'=>$ngaymuon,
                        'ngaytradk'=>$ngaytradk
                    ]); 
                }
                else{
                    $datemuon=new DateTime($ngaymuon);
                    $datetradk=new DateTime($ngaytradk);
                    if($datemuon > $datetradk){
                        echo '<script>alert("Ngày trả phải lớn hơn ngày mượn")</script>';
                    }
                    else{
                        $checksoluong=$this->sach->CheckSoLuong($masach);
                        if($checksoluong){
                            $checkmamuon=$this->muontra->CheckPhieuMuon($mamuon);
                            if($checkmamuon){
                                echo '<script>alert("Mã phiếu mượn đã tồn tại!")</script>';
                            }
                            else{
                                $ins=$this->muontra->ThemPhieuMuon($mamuon,$masach,$masv,$ngaymuon,$ngaytradk);
                                $giamsach=$this->sach->MuonSach($masach);
                                if($ins && $giamsach){
                                    echo '<script>alert("Đăng ký mượn sách thành công!")</script>';
                                }
                                else{
                                    echo '<script>alert("Đăng ký mượn sách thất bại!")</script>';
                                }
                            } 
                        }
                        else{
                            echo '<script>alert("Mã sách này đã được mượn hết!")</script>';
                        }
                    }
                    $this->view('MasterLayout_QL',[
                        'page'=>'Dangkymuonsach_v',
                        'info_sach'=>$this->sach->findSach($masach),
                        'info_sv'=>$this->sv->findSV($masv),
                        'mamuon'=>$mamuon,
                        'ngaymuon'=>$ngaymuon,
                        'ngaytradk'=>$ngaytradk
                    ]);  
                }
            }
        }
    }
?>