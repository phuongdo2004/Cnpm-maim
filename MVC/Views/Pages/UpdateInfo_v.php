<?php
    $masv='';$tensv='';$ngaysinh='';$email='';$sdt='';
    if(isset($data['info_sv'])&&mysqli_num_rows($data['info_sv'])>0){
        while($row=mysqli_fetch_assoc($data['info_sv'])){
            $masv=$row['maSV'];
            $tensv=$row['tenSV'];
            $ns=$row['ngaySinh'];
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
    <form class="row g-3" action="http://localhost/Library/UpdateInfo/Update" method="post">
        <h2>Cập nhật thông tin</h2>
        <div class="mb-3 row">
            <label for="MaSV" class="col-sm-2 col-form-label">Mã sinh viên</label>
            <div class="col-sm-10">
                <input name="txtMaSV" type="text" class="form-control" id="MaSV" readonly required value="<?php if(isset($masv)) echo $masv ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="Ten" class="col-sm-2 col-form-label">Họ và tên</label>
            <div class="col-sm-10">
                <input name="txtTenSV" type="text" class="form-control" id="Ten" readonly required value="<?php if(isset($tensv)) echo $tensv ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="NS" class="col-sm-2 col-form-label">Ngày sinh</label>
            <div class="col-sm-10">
                <input name="txtNgaySinh" type="date" class="form-control" id="NS" readonly required value="<?php if(isset($ns)) echo $ns ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="Email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="txtEmail" type="mail" class="form-control" id="Email" required maxlength="50" value="<?php if(isset($email)) echo $email ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="SDT" class="col-sm-2 col-form-label">Số điện thoại</label>
            <div class="col-sm-10">
                <input name="txtSDT" type="tel" class="form-control" id="SDT" required maxlength="10" value="<?php if(isset($sdt)) echo $sdt ?>">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="MK" class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-10">
                <input name="txtMatKhau" type="text" class="form-control" id="MK" required maxlength="50" value="<?php if(isset($mk)) echo $mk ?>">
            </div>
        </div> 
        <div class="col-12">
            <div style="float:right">
                <button name="btnCapNhat" class="btn btn-success" type="submit">Cập nhật</button>
            </div>  
        </div>
    </form>
</body>
</html>