<?php
    $masach='';$tensach='';$tacgia='';$nxb='';$theloai='';$soluong='';
    if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
        while($row=mysqli_fetch_assoc($data['dulieu'])){
            $masach=$row['maSach'];
            $tensach=$row['tenSach'];
            $tacgia=$row['tacGia'];
            $nxb=$row['nhaXuatBan'];
            $theloai=$row['theLoai'];
            $soluong=$row['soLuong'];
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
    <h2>Cập nhật thông tin sách</h2>
    <form class="row g-3" method="post" action="http://localhost/Library/Tracuusach/Capnhat">
        <div class="col-md-3">
            <label class="form-label">Mã sách</label>
            <input name="txtMaSach" type="text" class="form-control" placeholder="Nhập mã sách" required readonly maxlength="20" value="<?php if(isset($masach)) echo $masach?>">
        </div>
        <div class="col-md-9">
            <label class="form-label">Tên sách</label>
            <input name="txtTenSach" type="text" class="form-control" placeholder="Nhập tên sách" required maxlength="100" value="<?php if(isset($tensach)) echo $tensach?>">
        </div>
        <div class="col-md-7">
            <label class="form-label">Tác giả</label>
            <input name="txtTacGia" type="text" class="form-control" placeholder="Nhập tác giả" maxlength="200" required value="<?php if(isset($tacgia)) echo $tacgia?>">
        </div>
        <div class="col-md-5">
            <label class="form-label">Nhà xuất bản</label>
            <input name="txtNXB" type="text" class="form-control" placeholder="Nhập nhà xuất bản" required maxlength="100" value="<?php if(isset($nxb)) echo $nxb?>">
        </div>
        <div class="col-md-5">
            <label class="form-label">Thể loại</label>
            <input name="txtTheLoai" type="text" class="form-control" placeholder="Nhập thể loại" required maxlength="100" value="<?php if(isset($theloai)) echo $theloai?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Số lượng</label>
            <input name="txtSoLuong" type="number" class="form-control" placeholder="Nhập số lượng" required value="<?php if(isset($soluong)) echo $soluong?>">
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