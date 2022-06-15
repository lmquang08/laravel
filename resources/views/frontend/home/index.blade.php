@extends('frontend.layout-frontend')

@section('title', 'Home page')

@section('content')
<div class="col mb-3">
    <h3>Tour du lịch trong nước</h3>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($tour as $key => $value)
    <div class="col">
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="{{ asset($value->image_path) }}" class="img-fluid"/>
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $value->name }}</h5>
              <p class="card-text">
                Giới thiệu : {{ $value->description }}
              </p>
              <p class="card-text">
                Ngày khởi hành : {{ $value->start_date }}
              </p>
              <p class="card-text">
                Địa điểm xuất phát : {{ $value->start_address}}
              </p>
              <p class="card-text">
                Lịch trình : {{ $value->tour_date}}
              </p>
              <p class="card-text card-price">
                Giá Tour : {{ $value->price }}
              </p>
              <button class="btn btn-primary" type="submit">Đặt Tour</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="col mb-3 mt-5">
    <h3>Tour du lịch nước ngoài</h3>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="{{ asset('images/singapore.jpg') }}" class="img-fluid"/>
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Singapore</h5>
        <p class="card-text">
          Giới thiệu : Singapore còn có tên gọi khác là Quốc đảo Sư Tử. Sở dĩ có cái tên này chính là do chữ Singapore xuất phát từ chữ Singapura trong tiếng Malaysia.

          Xét theo nguồn gốc chữ Phạn, Singapura được ghép bởi 2 từ là Siga (Sư tử) và Pura ( Thành phố). Do đó mà đất nước này có tên gọi khác là Quốc đảo Sư Tử.
        </p>
        <p class="card-text">
          Ngày khởi hành : 25/07/2022
        </p>
        <p class="card-text">
          Địa điểm xuất phát : Hà Nội
        </p>
        <p class="card-text card-price">
          Giá Tour : 13.000.000
        </p>
        <button class="btn btn-primary" type="submit">Liên Hệ</button>
    </div>
  </div>
  <div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="{{ asset('images/phap.jpg') }}" class="img-fluid"/>
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Pháp</h5>
        <p class="card-text">
          Giới thiệu : Pháp là nước lớn nhất Tây Âu và lớn thứ ba ở châu Âu và cũng là nước có lịch sử lâu đời ở châu Âu, ngoài ra, còn có vùng đặc quyền kinh tế lớn thứ hai trên thế giới. Trong hơn 500 năm qua, Pháp là 1 cường quốc có ảnh hưởng văn hóa, kinh tế, quân sự và chính trị mạnh mẽ ở châu Âu và trên toàn thế giới.
        </p>
        <p class="card-text">
          Ngày khởi hành : 30/07/2022
        </p>
        <p class="card-text">
          Địa điểm xuất phát : Hồ Chí Minh
        </p>
        <p class="card-text card-price">
          Giá Tour : 32.000.000
        </p>
        <button class="btn btn-primary" type="submit">Liên Hệ</button>
    </div>
  </div>
  <div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="{{ asset('images/trungquoc.jpg') }}" class="img-fluid"/>
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Trung Quốc</h5>
        <p class="card-text">
          Giới thiệu : Văn hoá và phong tục tập quán của người Trung Quốc có từ lâu đời và vẫn giữ được nét riêng biệt, ít pha trộn với văn hoá Phương Tây.

          Trong quá trình quan hệ giao lưu giữa các dân tộc ở vùng đất Nam Bộ, mặc dù một số phong tục tập quán, văn hoá của người Hoa có sự giao thoa, gắn bó với phong tục, tập quán, văn hoá của các dân tộc anh em trong cộng đồng.
        </p>
        <p class="card-text">
          Ngày khởi hành : 27/07/2022
        </p>
        <p class="card-text">
          Địa điểm xuất phát : Hà Nội
        </p>
        <p class="card-text card-price">
          Giá Tour : 15.000.000
        </p>
        <button class="btn btn-primary" type="submit">Liên Hệ</button>
    </div>
  </div>
  <div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="{{ asset('images/taybannha.jpg') }}" class="img-fluid"/>
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Tây Ban Nha</h5>
        <p class="card-text">
          Giới thiệu : Tây Ban Nha là đất nước có nền văn hóa đặc sắc và đa dạng, là sự kết tinh của nhiều quốc gia, là một trong những nước có nền văn hóa đặc sắc nhất trên thế giới. Do từng có hệ thống thuộc địa rộng lớn vào thế kỷ 16 nên những ảnh hưởng văn hóa Tây Ban Nha đã trải rộng trên khăp thế giới. Một trong những điển hình mà cả thế giới biết đến đó là Lễ hội đấu bò tót, vũ điệu Flamenco bốc lửa và đặc biệt cây đàn ghita (Tây ban cầm) đã làm rung động hàng triệu trái tim.
        </p>
        <p class="card-text">
          Ngày khởi hành : 31/07/2022
        </p>
        <p class="card-text">
          Địa điểm xuất phát : Hà Nội
        </p>
        <p class="card-text card-price">
          Giá Tour : 28.000.000
        </p>
        <button class="btn btn-primary" type="submit">Liên Hệ</button>
    </div>
  </div>
  <div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="{{ asset('images/canada.jpg') }}" class="img-fluid"/>
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Canada</h5>
        <p class="card-text">
          Giới thiệu : Tương tự như quốc gia lân cận là Mỹ, Canada cũng có văn hóa tiền tip nên bạn cần lưu ý khi đến sử dụng dịch vụ tại nhà hàng hoặc quán nước ở quốc gia này. Nhân viên phục vụ thường chỉ nhận được lương cơ bản ở mức 10 đô la một giờ nên thu nhập chính vẫn đến từ tiền tip của khách. Số tiền tip quy chuẩn sẽ là 15 đến 20 % tổng hóa đơn nên trừ phi dịch vụ quá tệ thì bạn nên chủ động tip để thể hiện sự cảm kích vì đã được nhân viên chăm sóc chu đáo.
        </p>
        <p class="card-text">
          Ngày khởi hành : 25/07/2022
        </p>
        <p class="card-text">
          Địa điểm xuất phát : Hồ Chí Minh
        </p>
        <p class="card-text card-price">
          Giá Tour : 31.000.000
        </p>
        <button class="btn btn-primary" type="submit">Liên Hệ</button>
    </div>
  </div>
  <div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="{{ asset('images/my.jpg') }}" class="img-fluid"/>
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Mỹ</h5>
        <p class="card-text">
          Giới thiệu : Mỹ là một quốc gia đa văn hóa, là nơi sinh sống của nhiều nhóm đa dạng chủng tộc, truyền thống, và giá trị. Nói đến văn hóa chung của đa số người Mỹ là có ý nói đến “văn hóa đại chúng Mỹ.” Đó là một nền văn hóa Tây phương phần lớn là sự đút kết từ những truyền thống của các di dân từ Tây Âu, bắt đầu là các dân định cư người Hà Lan và người Anh trước tiên. Văn hóa Đức, Ireland và Scotland cũng có nhiều ảnh hưởng. Một số truyền thống của người bản thổ Mỹ và nhiều đặc điểm văn hóa của người nô lệ Tây Phi châu được hấp thụ vào đại chúng người Mỹ.
        </p>
        <p class="card-text">
          Ngày khởi hành : 10/07/2022
        </p>
        <p class="card-text">
          Địa điểm xuất phát : Hà Nội
        </p>
        <p class="card-text card-price">
          Giá Tour : 35.000.000
        </p>
        <button class="btn btn-primary" type="submit">Liên Hệ</button>
    </div>
  </div>
</div>
@endsection