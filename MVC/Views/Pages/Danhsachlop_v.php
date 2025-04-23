<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="http://localhost/DE5/Danhsachlop/timkiem">
        <div class="form-inline">
            <label style="width:110px;">Id</label>
            <input style="width:420px;" type="text" class="form-control" name="txtId" 
            value="<?php if(isset($data['id'])) echo $data['id'] ?>">
            <label style="width:110px;">Tên lớp</label>
            <input style="width:420px;" type="text" class="form-control" name="txtMalop" 
            value="<?php if(isset($data['malop'])) echo $data['malop'] ?>">
            <button type="submit" class="btn btn-success" name="btnTimkiem">Tìm kiếm</button>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr style="background:#efeded">
                    <th>STT</th>
                    <th>Id</th>
                    <th>Mã Lớp</th>
                    <th>Tên Lớp</th>
                    <th>Mã Khoa</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               <?php    
                if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
               ?>
                    <tr >
                        <td ><?php echo (++$i) ?></td>
                        <td ><?php echo $row['Id'] ?></td>
                        <td ><?php echo $row['malop'] ?></td>
                        <td ><?php echo $row['tenlop'] ?></td>
                        <td ><?php echo $row['makhoa'] ?></td>
                        <td>
                            <a href="http://localhost/DE5/Danhsachlop/sua/<?php echo $row['Id'] ?>"">
                                <img src="http://localhost/DE5/Public/Pictures/edit.gif" alt="">
                            </a>
                            <a href="http://localhost/DE5/Danhsachlop/xoa/<?php echo $row['Id'] ?>">
                                <img src="http://localhost/DE5/Public/Pictures/13.png" alt="">
                            </a>
                        </td>
                    </tr>
               <?php
                    }
                }
               ?>
            </tbody>
        </table>
    </form>
</body>
</html>