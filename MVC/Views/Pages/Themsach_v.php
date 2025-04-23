<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thêm mới sách</h2>
    <form class="row g-3" method="post" action="http://localhost/Library/Themsach/Themmoi">
        <div class="col-md-3">
            <label class="form-label">Mã sách</label>
            <input name="txtMaSach" type="text" class="form-control" placeholder="Nhập mã sách" required maxlength="20" value="<?php if(isset($data['masach'])) echo $data['masach']?>">
        </div>
        <div class="col-md-9">
            <label class="form-label">Tên sách</label>
            <input name="txtTenSach" type="text" class="form-control" placeholder="Nhập tên sách" required maxlength="100" value="<?php if(isset($data['tensach'])) echo $data['tensach']?>">
        </div>
        <div class="col-md-7">
            <label class="form-label">Tác giả</label>
            <input name="txtTacGia" type="text" class="form-control" placeholder="Nhập tác giả" maxlength="200" required value="<?php if(isset($data['tacgia'])) echo $data['tacgia']?>">
        </div>
        <div class="col-md-5">
            <label class="form-label">Nhà xuất bản</label>
            <input name="txtNXB" type="text" class="form-control" placeholder="Nhập nhà xuất bản" required maxlength="100" value="<?php if(isset($data['nxb'])) echo $data['nxb']?>">
        </div>
        <div class="col-md-5">
            <label class="form-label">Thể loại</label>
            <input name="txtTheLoai" type="text" class="form-control" placeholder="Nhập thể loại" required maxlength="100" value="<?php if(isset($data['theloai'])) echo $data['theloai']?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Số lượng</label>
            <input name="txtSoLuong" type="number" class="form-control" placeholder="Nhập số lượng" required value="<?php if(isset($data['soluong'])) echo $data['soluong']?>">
        </div>
        <div class="col-12">
            <button name="btnThem" class="btn btn-primary" type="submit">Thêm mới</button>
        </div>  
    </form>
</body>
</html>