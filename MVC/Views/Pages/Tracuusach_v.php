<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="row g-3" method="post" action="http://localhost/Library/Tracuusach/Timkiem">
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input name="txtMaSach" type="text" class="form-control" id="floatingInput1" value="<?php if(isset($data['masach'])) echo $data['masach']?>">
                <label for="floatingInput1">Mã sách</label>
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-floating mb-3">
                <input name="txtTenSach" type="text" class="form-control" id="floatingInput2" value="<?php if(isset($data['tensach'])) echo $data['tensach']?>">
                <label for="floatingInput2">Tên sách</label>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-floating mb-3">
                <input name="txtTacGia" type="text" class="form-control" id="floatingInput3" value="<?php if(isset($data['tacgia'])) echo $data['tacgia']?>">
                <label for="floatingInput3">Tác giả</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input name="txtNXB" type="text" class="form-control" id="floatingInput4" value="<?php if(isset($data['nxb'])) echo $data['nxb']?>">
                <label for="floatingInput4">Nhà xuất bản</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input name="txtTheLoai" type="text" class="form-control" id="floatingInput5" value="<?php if(isset($data['theloai'])) echo $data['theloai']?>">
                <label for="floatingInput5">Thể loại</label>
            </div>
        </div>
        <div class="col-md-1">
            <button name="btnTimKiem" class="btn btn-success" type="submit">Tìm kiếm</button>
        </div>  
    </form>
    <br>
    <table style="border-collapse:collapse;border: 1px solid black" class="table table-hover">
        <thead>
            <tr class="table-primary" style="text-align:center">
                <th style="width: 10vw;border: 1px solid black">STT</th>
                <th style="width: 15vw;border: 1px solid black">Mã sách</th>
                <th style="width: 30vw;border: 1px solid black">Tên sách</th>
                <th style="width: 15vw;border: 1px solid black">Tác giả</th>
                <th style="width: 20vw;border: 1px solid black">Nhà xuất bản</th>
                <th style="width: 10vw;border: 1px solid black"></th>
            </tr>    
        </thead>
        <tbody>
               <?php    
                if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
               ?>
                    <tr >
                        <td style="width: 10vw;border: 1px solid black;text-align:center"><?php echo (++$i) ?></td>
                        <td style="width: 15vw;border: 1px solid black"><?php echo $row['maSach'] ?></td>
                        <td style="width: 30vw;border: 1px solid black"><?php echo $row['tenSach'] ?></td>
                        <td style="width: 15vw;border: 1px solid black"><?php echo $row['tacGia'] ?></td>
                        <td style="width: 20vw;border: 1px solid black"><?php echo $row['nhaXuatBan'] ?></td>
                        <td style="width: 10vw;border: 1px solid black">
                            <a href="http://localhost/Library/Tracuusach/Chinhsua/<?php echo $row['maSach'] ?>">
                                Chi tiết
                            </a>
                        </td>
                    </tr>
               <?php
                    }
                }
               ?>
            </tbody>
    </table>
</body>
</html>