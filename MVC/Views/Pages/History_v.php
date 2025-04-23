<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tra cứu tình trạng mượn trả sách</h2>
    <form class="row g-3" method="post" action="http://localhost/Library/History/Searching">
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input name="txtMaMuon" type="text" class="form-control" id="floatingInput0" value="<?php if(isset($data['mamuon'])) echo $data['mamuon']?>">
                <label for="floatingInput0">Phiếu mượn</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input name="txtMaSach" type="text" class="form-control" id="floatingInput1" value="<?php if(isset($data['masach'])) echo $data['masach']?>">
                <label for="floatingInput1">Mã sách</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <select name="txtTinhTrang" class="form-control" id="floatingInput3">
                    <option value="">----------</option>
                    <option value="Conhan" <?php if(isset($data['tinhtrang']) && $data['tinhtrang']=="Conhan") echo 'selected' ?> >Trong hạn mượn</option>
                    <option value="Quahan" <?php if(isset($data['tinhtrang']) && $data['tinhtrang']=="Quahan") echo 'selected' ?> >Quá hạn mượn</option>
                    <option value="Datra" <?php if(isset($data['tinhtrang']) && $data['tinhtrang']=="Datra") echo 'selected' ?> >Đã trả sách</option>
                </select>
                <label for="floatingInput3">Tình trạng</label>
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
                <th style="width: 20vw;border: 1px solid black">Phiếu mượn</th>
                <th style="width: 25vw;border: 1px solid black">Mã sách</th>
                <th style="width: 15vw;border: 1px solid black">Ngày mượn</th>
                <th style="width: 15vw;border: 1px solid black">Ngày trả dự kiến</th>
                <th style="width: 15vw;border: 1px solid black">Ngày trả thực tế</th>
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
                        <td style="width: 20vw;border: 1px solid black"><?php echo $row['maMuon'] ?></td>
                        <td style="width: 25vw;border: 1px solid black"><?php echo $row['maSach'] ?></td>
                        <td style="width: 15vw;border: 1px solid black"><?php echo $row['FngayMuon'] ?></td>
                        <td style="width: 15vw;border: 1px solid black"><?php echo $row['FngayTraDK'] ?></td>
                        <td style="width: 15vw;border: 1px solid black"><?php echo $row['FngayTraTT'] ?></td>
                    </tr>
               <?php
                    }
                }
               ?>
            </tbody>
    </table>
</body>
</html>