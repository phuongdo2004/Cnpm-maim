<?php
    $masach='';$tensach='';$tacgia='';$nxb='';$theloai='';$soluong='';
    if(isset($data['info_sach'])&&mysqli_num_rows($data['info_sach'])>0){
        while($row=mysqli_fetch_assoc($data['info_sach'])){
            $masach=$row['maSach'];
            $tensach=$row['tenSach'];
            $tacgia=$row['tacGia'];
            $nxb=$row['nhaXuatBan'];
            $theloai=$row['theLoai'];
            $soluong=$row['soLuong'];
        } 
    }

    $masv='';$tensv='';$ngaysinh='';$email='';$sdt='';
    if(isset($data['info_sv'])&&mysqli_num_rows($data['info_sv'])>0){
        while($row=mysqli_fetch_assoc($data['info_sv'])){
            $masv=$row['maSV'];
            $tensv=$row['tenSV'];
            $ngaysinh=$row['ngaySinh'];
            $email=$row['email'];
            $sdt=$row['soDienThoai'];
        } 
    }

    $mamuon='';$ngaymuon='';$ngaytradk='';$ngaytratt='';$trangthai='';
    if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
        while($row=mysqli_fetch_assoc($data['dulieu'])){
            $mamuon=$row['maMuon'];
            $ngaymuon=$row['ngayMuon'];
            $ngaytradk=$row['ngayTraDK'];
            $ngaytratt=$row['ngayTraTT'];
            $trangthai=$row['trangThai'];
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="http://localhost/Library/Tracuumuontra/Chitietphieumuon" method="post" class="row g-3">
        <h2>Đăng ký phiếu mượn sách</h2>
        
        <div class="mb-3 row">
            <label for="PhieuMuon" class="col-sm-2 col-form-label">Mã phiếu mượn</label>
            <div class="col-sm-10">
                <input name="txtMaMuon" type="text" class="form-control" id="PhieuMuon" readonly required maxlength="20" value="<?php if(isset($mamuon)) echo $mamuon ?>">
            </div>
        </div> 
        <hr>
        <table>
            <tr>
                <td>
                    <h3>Thông tin sách</h3>
                    <div class="input-group mb-3">
                        <input name="txtMaSach" type="text" class="form-control" readonly placeholder="Nhập mã sách" aria-label="Recipient's username" aria-describedby="button-addon2" required value="<?php if(isset($masach)) echo $masach ?>" maxlength="20">
                    </div>
                    <?php
                        if(isset($data['sach-null']) && $data['sach-null']=="NoInfo"){
                            ?>
                            <div style="color:red">
                                Mã sách không tồn tại.
                            </div>
                        <?php
                        }
                    ?>
                    <div class="mb-3 row">
                        <label for="TenSach" class="col-sm-2 col-form-label">Tên sách</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="TenSach" required readonly value="<?php if(isset($tensach)) echo $tensach ?>">
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="TacGia" class="col-sm-2 col-form-label">Tác giả</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="TacGia" required readonly value="<?php if(isset($tacgia)) echo $tacgia ?>">
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="NXB" class="col-sm-2 col-form-label">NXB</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NXB" required readonly value="<?php if(isset($nxb)) echo $nxb ?>">
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="TheLoai" class="col-sm-2 col-form-label">Thể loại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="TheLoai" required readonly value="<?php if(isset($theloai)) echo $theloai ?>">
                        </div>
                    </div>
                </td>
                <td>
                    <h3>Thông tin sinh viên</h3>
                    <div class="input-group mb-3">
                        <input name="txtMaSV" type="text" class="form-control" readonly placeholder="Nhập mã sinh viên" aria-label="Recipient's username" aria-describedby="button-addon2" required value="<?php if(isset($masv)) echo $masv ?>" maxlength="20">
                    </div>
                    <div class="mb-3 row">
                        <label for="TenSV" class="col-sm-2 col-form-label">Họ&tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="TenSV" required readonly value="<?php if(isset($tensv)) echo $tensv ?>">
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="NgaySinh" class="col-sm-2 col-form-label">Ng.sinh</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="NgaySinh" required readonly value="<?php if(isset($ngaysinh)) echo $ngaysinh ?>">
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Email" required readonly value="<?php if(isset($email)) echo $email ?>">
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="SDT" class="col-sm-2 col-form-label">SĐT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="SDT" required readonly value="<?php if(isset($sdt)) echo $sdt ?>">
                        </div>
                    </div>
                </td>
            </tr>
        </table>      

        <br><hr>

        <h3>Thời gian mượn sách</h3>
        <table>
            <tr>
                <td>
                    <div class="mb-3 row">
                        <label for="NgayMuon" class="col-sm-5 col-form-label">Ngày mượn</label>
                        <div class="col-sm-7">
                            <input readonly name="txtNgayMuon" type="date" class="form-control" id="NgayMuon" required value="<?php if(isset($ngaymuon)) echo $ngaymuon ?>">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="mb-3 row">
                        <label for="NgayTraDK" class="col-sm-5 col-form-label">Ngày trả dự kiến</label>
                        <div class="col-sm-7">
                            <input readonly name="txtNgayTraDK" type="date" class="form-control" id="NgayTraDK" required value="<?php if(isset($ngaytradk)) echo $ngaytradk ?>">
                        </div>
                    </div> 
                </td>
                <td>
                    <div class="mb-3 row">
                        <label for="NgayTraTT" class="col-sm-5 col-form-label">Ngày trả thực tế</label>
                        <div class="col-sm-7">
                            <input readonly name="txtNgayTraTT" type="date" class="form-control" id="NgayTraTT" required value="<?php if(isset($ngaytratt)) echo $ngaytratt ?>">
                        </div>
                    </div> 
                </td>
            </tr>
        </table>
    
        <br><hr>

        <h3>Gia hạn mượn sách</h3>
            <div class="mb-3 row">
                <label for="NgayTraDK2" class="col-sm-2 col-form-label">Ngày trả dự kiến</label>
                <div class="col-sm-7">
                    <input name="txtNgayTraDKNew" type="date" class="form-control" id="NgayTraDK2" <?php if($trangthai=="Đã trả") echo 'disabled' ?>>
                </div>
                <div class="col-sm-3">
                    <button name="btnGiaHan" class="btn btn-success" type="submit" <?php if($trangthai=="Đã trả") echo 'disabled' ?>>Gia hạn mượn sách</button>
                </div>
            </div> 

        <br><hr>
        <h3>Trả sách</h3>
        <div class="mb-3 row">
            <label for="TrangThai" class="col-sm-3 col-form-label">Xác nhận sinh viên trả sách</label>
            <div class="col-sm-4">
                <button name="btnTraSach" class="btn btn-danger" type="submit" <?php if($trangthai=="Đã trả") echo 'disabled' ?> onclick="return confirm('Xác nhận trả sách?');">Xác nhận trả sách</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>