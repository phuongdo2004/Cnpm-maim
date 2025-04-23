<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        * {
        margin: 0;
        padding: 0;
        }
        .form-tt {
        width: 40vw;
        border-radius: 10px;
        overflow: hidden;
        padding: 55px 55px 37px;
        background: #9152f8;
        background: -webkit-linear-gradient(top,#7579ff,#b224ef);
        background: -o-linear-gradient(top,#7579ff,#b224ef);
        background: -moz-linear-gradient(top,#7579ff,#b224ef);
        background: linear-gradient(top,#7579ff,#b224ef);
        text-align: center;
        }
        .form-tt h2 {
        font-size: 30px;
        color: #fff;
        line-height: 1.2;
        text-align: center;
        text-transform: uppercase;
        display: block;
        margin-bottom: 30px;
        }

        .form-tt input[type=text], .form-tt input[type=password] {
        font-size: 16px;
        color: #fff;
        line-height: 1.2;
        display: block;
        width: calc(100% - 10px);
        height: 45px;
        background: 0 0;
        padding: 10px 0;
        border-bottom: 2px solid rgba(255,255,255,.24)!important;
        border: 0;
        outline: 0;
        }
        .form-tt input[type=text]::focus, .form-tt input[type=password]::focus {
        color: red;
        }
        .form-tt input[type=password] {
        margin-bottom: 20px;
        }
        .form-tt input::placeholder {
        color: #fff;
        }
        .checkbox {
        display: block;
        }
        .form-tt button {
        font-size: 16px;
        color: #555;
        line-height: 1.2;
        padding: 0 20px;
        min-width: 120px;
        height: 50px;
        border-radius: 25px;
        background: #fff;
        position: relative;
        z-index: 1;
        border: 0;
        outline: 0;
        display: block;
        margin: 30px auto;
        }
        #checkbox {
        display: inline-block;
        margin-right: 10px;
        }
        .checkbox-text {
        color: #fff;
        }
        .psw-text {
        color: #fff;
        }
    </style>
</head>
<body style="padding-top: 50px; padding-left: 30vw;">
    <div class="form-tt">
        <h2>Đăng nhập</h2>
        <form action="http://localhost/Library/Login/Logging" method="post" name="dang-ky">
            <input type="text" name="txtMaSV" required placeholder="Nhập mã sinh viên" />
            <input type="password" name="txtMatKhau" required placeholder="Nhập mật khẩu" />
            <button type="submit" name="btnDangNhap">Đăng nhập</button>
        </form>
    </div>
</body>
</html>