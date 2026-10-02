<div class="carousel slide" data-ride="carousel" id="myCarousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li class="active" data-slide-to="0" data-target="#myCarousel"></li>
    <li data-slide-to="1" data-target="#myCarousel"></li>
    <li data-slide-to="2" data-target="#myCarousel"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <div class="img-n" style="background-image: url('{{ asset('themes/ehenho/images/tim-ban-bon-phuong.jpg') }}')"></div>
      <div class="container">
        <div class="carousel-caption">
          <h1 style="text-shadow: 2px -2px 0 rgba(255,255,255,.4);">
            eHenho.com - Hẹn hò Online &amp; Tìm bạn Bốn phương
          </h1>
          <p style="text-shadow: 1px -1px 0.1 rgba(0,0,0,.8);">
            Chủ động, Bảo mật &amp; Hoàn toàn Miễn Phí!!
          </p>
          <p>
            <a class="btn btn-danger btn-dg-cus btn-lg" href="{{ route('ehenho.register') }}" role="button">
              <i aria-hidden="true" class="fa fa-arrow-right"></i> TẠO HỒ SƠ CỦA BẠN!
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="img-n" style="background-image: url('{{ asset('themes/ehenho/images/tim-nguoi-yeu.jpg') }}')"></div>
      <div class="container">
        <div class="carousel-caption">
          <h1 style="text-shadow: 2px -2px 0 rgba(255,255,255,.5);">
            eHenho.com - Hẹn hò Online theo Sở thích &amp; Tính cách
          </h1>
          <p style="text-shadow: 1px -1px 0.1 rgba(0,0,0,.8);">
            Bạn muốn tìm người cùng sở thích &amp; tính cách tương đồng với bạn chứ!?
          </p>
          <p>
            <a class="btn btn-danger btn-dg-cus btn-lg" href="{{ route('ehenho.register') }}" role="button">
              <i aria-hidden="true" class="fa fa-arrow-right"></i> TẠO HỒ SƠ CỦA BẠN!
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="img-n" style="background-image: url('{{ asset('themes/ehenho/images/tim-ban-doi-nghiem-tuc.jpg') }}')"></div>
      <div class="container">
        <div class="carousel-caption">
          <h1 style="text-shadow: 2px -2px 0 rgba(255,255,255,.5);">
            eHenho.com - Tìm Bạn Đời Nghiêm Túc
          </h1>
          <p style="text-shadow: 1px -1px 0.1 rgba(0,0,0,.8);">
            Cơ hội gặp gỡ một nửa yêu thương của cuộc đời bạn!
          </p>
          <p>
            <a class="btn btn-danger btn-dg-cus btn-lg" href="{{ route('ehenho.register') }}" role="button">
              <i aria-hidden="true" class="fa fa-arrow-right"></i> TẠO HỒ SƠ CỦA BẠN!
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button">
    <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" data-slide="next" href="#myCarousel" role="button">
    <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
