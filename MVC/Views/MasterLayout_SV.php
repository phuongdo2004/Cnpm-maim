<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư viện UTT</title>
    <style>
      .layout{
        display: grid;
        grid-gap: 0px;
        grid-template-rows: 90px auto 40px ;
        grid-template-columns: 20vw auto;
        grid-template-areas: 
          "header header" 
          "menu main"
          "footer footer";
        height: 100vh;
      }
      .header{
        grid-area: header;
        background-color: #22177A;
        padding-top: 5pt;
        padding-left: 10pt;
        display: flex;
        color: white;
      }
      .menu{
        grid-area: menu;
        padding: 10px;
        background-color: #22177A;
        color: white !important;
      }
      .main{
        grid-area: main;
        background-color: #22177A;
        padding: 10px;
      }
      .footer{
        padding-left: 10px;
        padding-right: 10px;
        color: white;
        grid-area: footer;
        background-color: #22177A;
      }
      .content{
        background-color: white;
        border-radius: 24px;
        width: 100%;
        height: 100%;
        padding: 15px;
      }
      .link{
        text-decoration: none;
        color: black;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
  <div class="layout">
    <div class="header">
        <div style="width: fit-content;">
            <a href="http://localhost/Library/TrangChu">
                <img src="http://localhost/Library/Public/Pictures/uttbanner.png" alt="Trường Đại học Công nghệ Giao thông vận tải" style="height: 60pt;">
            </a>
        </div>
        <div style="padding-top: 10pt; padding-left: 20pt;">
            <a href="http://localhost/Library/TrangChu" class="link" style="color: white !important">
                <h1>Thư viện UTT</h1>
            </a>
        </div>
    </div>  

    <div class="menu">
      <div class="accordion" id="accordionFlushExample"">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <a href="" class="link">Tài khoản</a>
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul>
                <li><a href="http://localhost/Library/UpdateInfo" class="link">Thay đổi thông tin</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Sách
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul>
                <li><a href="http://localhost/Library/BookSearch" class="link">Tìm kiếm sách</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Lịch sử mượn sách
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul>
                <li><a href="http://localhost/Library/History" class="link">Tra cứu</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main">
      <div class="content">
        <?php 
          include_once './MVC/Views/Pages/'.$data['page'].'.php';
        ?>
      </div>
    </div>

    <div class="footer">
      <div style="float:right">
        Tài khoản: <?php echo $_SESSION['maSV'] ?> | <a href="http://localhost/Library/Login" class="link" style="color:white !important">Thoát</a>
      </div>
    </div>
  </div>
</body>
</html>