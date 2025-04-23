<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="row g-3" method="post" action="http://localhost/Library/Tracuusinhvien/Timkiem">
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input name="txtMaSV" type="text" class="form-control" id="floatingInput1" value="<?php if(isset($data['masv'])) echo $data['masv']?>">
                <label for="floatingInput1">Mã sinh viên</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input name="txtTenSV" type="text" class="form-control" id="floatingInput2" value="<?php if(isset($data['tensv'])) echo $data['tensv']?>">
                <label for="floatingInput2">Họ và tên</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input name="txtEmail" type="mail" class="form-control" id="floatingInput3" value="<?php if(isset($data['email'])) echo $data['email']?>">
                <label for="floatingInput3">Email</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-floating mb-3">
                <input name="txtSoDienThoai" type="tel" class="form-control" id="floatingInput4" value="<?php if(isset($data['sdt'])) echo $data['sdt']?>">
                <label for="floatingInput4">Số điện thoại</label>
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
                <th style="width: 15vw;border: 1px solid black">Mã sinh viên</th>
                <th style="width: 20vw;border: 1px solid black">Họ và tên</th>
                <th style="width: 10vw;border: 1px solid black">Ngày sinh</th>
                <th style="width: 20vw;border: 1px solid black">Email</th>
                <th style="width: 15vw;border: 1px solid black">Số điện thoại</th>
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
                        <td style="width: 15vw;border: 1px solid black"><?php echo $row['maSV'] ?></td>
                        <td style="width: 20vw;border: 1px solid black"><?php echo $row['tenSV'] ?></td>
                        <td style="width: 10vw;border: 1px solid black"><?php echo $row['formattedNgaySinh'] ?></td>
                        <td style="width: 20vw;border: 1px solid black"><?php echo $row['email'] ?></td>
                        <td style="width: 15vw;border: 1px solid black"><?php echo $row['soDienThoai'] ?></td>
                        <td style="width: 10vw;border: 1px solid black">
                            <a href="http://localhost/Library/Tracuusinhvien/Chitietsinhvien/<?php echo $row['maSV'] ?>">
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