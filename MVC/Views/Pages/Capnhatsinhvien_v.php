<?php
    $masv='';$tensv='';$ngaysinh='';$email='';$sdt='';$mk='';
    if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
        while($row=mysqli_fetch_assoc($data['dulieu'])){
            $masv=$row['maSV'];
            $tensv=$row['tenSV'];
            $ngaysinh=$row['ngaySinh'];
            $email=$row['email'];
            $sdt=$row['soDienThoai'];
            $mk=$row['matKhau'];
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
    <h2>Cập nhật thông tin sinh viên</h2>
    <form class="row g-3" method="post" action="http://localhost/Library/Tracuusinhvien/Thongtinchitiet">
        <div class="col-md-4">
            <label class="form-label">Mã sinh viên</label>
            <input name="txtMaSV" type="text" class="form-control" placeholder="Nhập mã sinh viên" required maxlength="20" value="<?php if(isset($masv)) echo $masv?>" readonly>
        </div>
        <div class="col-md-4">
            <label class="form-label">Họ và tên</label>
            <input name="txtTenSV" type="text" class="form-control" placeholder="Nhập họ và tên (Tối đa 50 kí tự)" required maxlength="50" value="<?php if(isset($tensv)) echo $tensv?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Ngày sinh</label>
            <input name="txtNgaySinh" type="date" class="form-control" placeholder="Nhập ngày sinh" required value="<?php if(isset($ngaysinh)) echo $ngaysinh?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Email</label>
            <input name="txtEmail" type="mail" class="form-control" placeholder="Nhập email (Tối đa 50 kí tự)" required maxlength="50" value="<?php if(isset($email)) echo $email?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Số điện thoại</label>
            <input name="txtSoDienThoai" type="tel" class="form-control" placeholder="Nhập số điện thoại" required maxlength="10" value="<?php if(isset($sdt)) echo $sdt?>">
        </div> 
        <div class="col-md-4">
            <label class="form-label">Mật khẩu</label>
            <input name="txtMatKhau" type="text" class="form-control" required maxlength="50" value="<?php if(isset($mk)) echo $mk?>">
        </div> 
        <div class="col-12">
            <div style="float:right">
                <button name="btnCapNhat" class="btn btn-success" type="submit">Cập nhật</button>
                <button name="btnXoa" class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xoá</button>
            </div>  
        </div>
    </form>
</body>
</html>