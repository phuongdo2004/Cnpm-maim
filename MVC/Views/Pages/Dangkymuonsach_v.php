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
    <form action="http://localhost/Library/Dangkymuonsach/Muonsach" method="post" class="row g-3">
        <h2>Đăng ký phiếu mượn sách</h2>
        
        <div class="mb-3 row">
            <label for="PhieuMuon" class="col-sm-2 col-form-label">Mã phiếu mượn</label>
            <div class="col-sm-10">
                <input name="txtMaMuon" type="text" class="form-control" id="PhieuMuon"  maxlength="20" value="<?php if(isset($data['mamuon'])) echo $data['mamuon'] ?>">
            </div>
        </div> 
        <hr>

        <h3>Thông tin sách</h3>
        <div class="input-group mb-3">
            <input name="txtMaSach" type="text" class="form-control" placeholder="Nhập mã sách" aria-label="Recipient's username" aria-describedby="button-addon2"  value="<?php if(isset($masach)) echo $masach ?>" maxlength="20">
            <button name="btnTimSach" class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
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
                <input type="text" class="form-control" id="TenSach"  readonly value="<?php if(isset($tensach)) echo $tensach ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="TacGia" class="col-sm-2 col-form-label">Tác giả</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="TacGia"  readonly value="<?php if(isset($tacgia)) echo $tacgia ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="NXB" class="col-sm-2 col-form-label">Nhà xuất bản</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NXB"  readonly value="<?php if(isset($nxb)) echo $nxb ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="TheLoai" class="col-sm-2 col-form-label">Thể loại</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="TheLoai"  readonly value="<?php if(isset($theloai)) echo $theloai ?>">
            </div>
        </div> 

        <br><hr>

        <h3>Thông tin sinh viên</h3>
        <div class="input-group mb-3">
            <input name="txtMaSV" type="text" class="form-control" placeholder="Nhập mã sinh viên" aria-label="Recipient's username" aria-describedby="button-addon2"  value="<?php if(isset($masv)) echo $masv ?>" maxlength="20">
            <button name="btnTimSV" class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
        </div>
        <?php
            if(isset($data['sv-null']) && $data['sv-null']=="NoInfo"){
                ?>
                <div style="color:red">
                    Mã sinh viên không tồn tại. <a href="http://localhost/Library/Taotaikhoan">Nhấp vào đây để tạo tài khoản mượn sách.</a>
                </div>
            <?php
            }
        ?>
        <div class="mb-3 row">
            <label for="TenSV" class="col-sm-2 col-form-label">Họ và tên</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="TenSV"  readonly value="<?php if(isset($tensv)) echo $tensv ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="NgaySinh" class="col-sm-2 col-form-label">Ngày sinh</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="NgaySinh"  readonly value="<?php if(isset($ngaysinh)) echo $ngaysinh ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="Email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Email"  readonly value="<?php if(isset($email)) echo $email ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="SDT" class="col-sm-2 col-form-label">Số điện thoại</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="SDT"  readonly value="<?php if(isset($sdt)) echo $sdt ?>">
            </div>
        </div> 

        <br><hr>

        <h3>Thời gian mượn sách</h3>
        <div class="mb-3 row">
            <label for="NgayMuon" class="col-sm-2 col-form-label">Ngày mượn</label>
            <div class="col-sm-10">
                <input name="txtNgayMuon" type="date" class="form-control" id="NgayMuon"  value="<?php if(isset($data['ngaymuon'])) echo $data['ngaymuon'] ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="NgayTraDK" class="col-sm-2 col-form-label">Ngày trả dự kiến</label>
            <div class="col-sm-10">
                <input name="txtNgayTraDK" type="date" class="form-control" id="NgayTraDK"  value="<?php if(isset($data['ngaytradk'])) echo $data['ngaytradk'] ?>">
            </div>
        </div> 
        <br>
        <div class="col-12">
            <button name="btnMuon" class="btn btn-primary" type="submit">Đăng ký mượn sách</button>
        </div>  
    </form>
    </div>
</body>
</html>