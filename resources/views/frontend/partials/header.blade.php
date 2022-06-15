{{-- <header class="bg-dark py-5">
    <div class="header-top">
        <i class="fa-solid fa-bars"></i>
        <ul>
            <li style="--x:1"><a href="">Trang chủ</a></li>
            <li style="--x:2"><a href="">Đặc điểm</a></li>
            <li style="--x:3"><a href="">Về chúng tôi</a></li>
            <li style="--x:4"><a href="">Bộ sưu tập</a></li>
            <li style="--x:5"><a href="">Đánh giá</a></li>
            <li style="--x:6"><a href="">Liên hệ</a></li>
        </ul>
    </div>
    <div class="video-container">
        <video src="{{ asset('frontend/video/ab.mp4') }}" autoplay muted loop></video>
    </div>
    <div class="header-content">
        <h1>Khám phá</h1>
        <p>Xách ba lô lên và đi thôi nào</p>
        <form action="">
            <h1>Bạn muốn đi đâu???</h1>
            <p>Địa điểm</p>
            <select name="" id="">
                <option value="">--Chọn địa điểm--</option>
            </select>
            <p>Số người</p>
            <input type="number" min="1" placeholder="Bạn đi bao nhiêu người?">
            <p>Ngày đi</p>
            <input type="date" name="" id="">
            <p>Ngày Về</p>
            <input type="date" name="" id="">
            <button class="btnSearch">Tìm kiếm</button>
        </form>
    </div>
</header> --}}

<!-- Carousel wrapper -->
<div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active" aria-current="true"
      aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner rounded-5 shadow-4-strong">
    <!-- Single item -->
    <div class="carousel-item active">
      <img src="{{ asset('images/halong1.jpg') }}" class="slide-item d-block w-100"
        alt="Sunset Over the City" />
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>

    

    <!-- Single item -->
    <div class="carousel-item">
      <img src="{{ asset('images/taphin.jpg') }}" class="slide-item d-block w-100"
        alt="Canyon at Nigh" />
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="{{ asset('images/hoasen.png') }}" class="slide-item d-block w-100"
        alt="Cliff Above a Stormy Sea" />
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->
<div class="header">
  <div class="header-item bg-light">
      <a href=""><i class="fas fa-search fa-lg me-3 fa-fw "></i>Du Lịch <span>Trong Nước</span></a>
  </div>
  <div class="header-item bg-success">
      <a href=""><i class="fas fa-plane fa-lg me-3 fa-fw "></i>Du Lịch <span>Nước Ngoài</span></a>
  </div>
  <div class="header-item bg-warning">
      <a href=""><i class="fas fa-users fa-lg me-3 fa-fw "></i>Tour <span>Khách Đoàn</span></a>
  </div>
  <div class="header-item bg-info">
      <a href=""><i class="fas fa-suitcase fa-lg me-3 fa-fw "></i>Combo <span>Du Lịch</span></a>
  </div>
</div>