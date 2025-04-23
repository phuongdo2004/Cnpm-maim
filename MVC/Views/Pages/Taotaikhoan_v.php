<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tạo tài khoản thư viện cho sinh viên</h2>
    <form class="row g-3" method="post" action="http://localhost/Library/Taotaikhoan/Themmoi">
        <div class="col-md-6">
            <label class="form-label">Mã sinh viên</label>
            <input name="txtMaSV" type="text" class="form-control" placeholder="Nhập mã sinh viên" required maxlength="20" value="<?php if(isset($data['masv'])) echo $data['masv']?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Họ và tên</label>
            <input name="txtTenSV" type="text" class="form-control" placeholder="Nhập họ và tên (Tối đa 50 kí tự)" required maxlength="50" value="<?php if(isset($data['tensv'])) echo $data['tensv']?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Ngày sinh</label>
            <input name="txtNgaySinh" type="date" class="form-control" placeholder="Nhập ngày sinh" required value="<?php if(isset($data['ngaysinh'])) echo $data['ngaysinh']?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Email</label>
            <input name="txtEmail" type="mail" class="form-control" placeholder="Nhập email (Tối đa 50 kí tự)" required maxlength="50" value="<?php if(isset($data['email'])) echo $data['email']?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Số điện thoại</label>
            <input name="txtSoDienThoai" type="tel" class="form-control" placeholder="Nhập số điện thoại" required maxlength="10" value="<?php if(isset($data['sdt'])) echo $data['sdt']?>">
        </div>
        <div class="col-12">
            <label class="form-check-label">* Mật khẩu của tài khoản mới tạo là <u>số điện thoại</u> dùng để đăng ký</label>
        </div>  
        <div class="col-12">
            <button name="btnDangKy" class="btn btn-primary" type="submit">Đăng ký</button>
        </div>  
    </form>
</body>
</html>