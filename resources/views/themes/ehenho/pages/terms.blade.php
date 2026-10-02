@extends('themes.ehenho.layouts.app')

@section('title', 'Điều khoản sử dụng - eHenho.com')
@section('meta_description', 'Các điều khoản sử dụng và quy định tham gia cộng đồng eHenho.com.')

@section('content')
<header class="text-center" style="background-color: #FCF8E3; color:#8A6D3B; padding-top:6px; padding-bottom:6px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span style="font-size:1.0em" title="Lưu ý">
          <i aria-hidden="true" class="fa fa-info-circle"></i>
          eHenho.com 100% Miễn Phí!
        </span>
      </div>
    </div>
  </div>
</header>

<div class="container cont-sb-loc">
  <a class="b-button" href="{{ route('ehenho.search.index') }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn bốn phương theo Tỉnh Thành
  </a>
  <a class="b-button" href="{{ route('ehenho.about') }}">
    <span class="glyphicon glyphicon-question-sign"></span> Giới thiệu về eHenho
  </a>
</div>

<div class="container" style="background-color:#FFF; padding-top:20px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-0">
      <h1 class="text-success" style="font-size: 26px; font-weight: bold; margin-bottom: 15px;">
        {{ $page->title ?? 'Điều khoản sử dụng' }}
      </h1>
      
      @if(!empty($page?->content))
        <div class="dynamic-page-content" style="font-size:1.05em; line-height:1.7em; color: #333;">
          {!! $page->content !!}
        </div>
      @else
      <h2 class="text-danger" style="font-size:1.2em; line-height:1.6em; margin-bottom: 25px;">
        eHenho.com ("chúng tôi" bên dưới) có các điều khoản sử dụng liên quan đến việc người dùng sử dụng trang web eHenho.com. Khi bạn sử dụng trang web eHenho.com thì có nghĩa là bạn đã đồng ý với các điều khoản sử dụng bên dưới.
      </h2>

      <div style="font-size:1.05em; line-height:1.6em">
        <p>
          <b>Hiệu lực</b><br/>
          Điều khoản sử dụng này được áp dụng đối với trang web <a href="{{ url('/') }}">eHenho.com</a>.<br/>
          Điều khoản sử dụng này có hiệu lực từ ngày 01/09/2017.
        </p>

        <p>
          <b>Thông tin liên lạc</b><br/>
          Bạn có thể truy cập thông tin về eHenho.com tại website hoặc liên lạc với chúng tôi qua email: 
          <a href="mailto:hi@ehenho.com">hi@ehenho.com</a>.
        </p>

        <p>
          <b>1.</b><br/>
          Mỗi người dùng hoàn toàn chịu trách nhiệm về tính chính xác và hợp pháp của thông tin được tạo ra bởi chính người dùng đó trên trang web này. Thông tin được tạo ra bởi người dùng bao gồm hồ sơ và hình ảnh đại diện của người dùng, và các tin nhắn được trao đổi qua lại giữa người dùng này với những người dùng khác trên trang web.
        </p>

        <p>
          <b>2.</b><br/>
          Người dùng cam kết:<br/>
          <span>
            - Không tạo hồ sơ hay gửi tin nhắn có nội dung vi phạm văn hóa, lịch sử, thuần phong mỹ tục.<br/>
            - Không tạo hồ sơ hay gửi tin nhắn có nội dung nhạy cảm liên quan đến phân biệt chủng tộc, bạo lực, khủng bố, tình dục.<br/>
            - Không tạo hồ sơ hay gửi tin nhắn có nội dung không phù hợp liên quan đến tôn giáo, chính trị.<br/>
            - Không tạo hồ sơ hay gửi tin nhắn có nội dung giả mạo, lừa đảo, bêu xấu, đe dọa, khủng bố người khác.<br/>
            - Không tạo hồ sơ hay gửi tin nhắn có nội dung vi phạm bản quyền.<br/>
            - Không dùng từ ngữ thô tục, phản cảm, đồi trụy, lừa đảo, vu khống, quảng cáo hay nội dung không phù hợp.<br/>
            - Không dùng từ ngữ bóp méo ngôn ngữ hay cố tình viết sai chính tả, dễ gây hiểu lầm cho người khác.<br/>
            - Giao tiếp một cách văn minh, lịch thiệp với các người dùng khác trên trang web.
          </span>
        </p>

        <p>
          <b>3.</b><br/>
          Chúng tôi không có bất cứ bảo đảm nào hoặc tuyên bố nào về tính chính xác, tính tin cậy hay mức độ hoàn thiện của bất kỳ thông tin nào được tạo ra bởi người dùng. Người dùng rõ ràng nhận thức được và chấp thuận rằng chúng tôi không chịu trách nhiệm về bất cứ hành vi nào của bất kỳ người dùng nào.
        </p>

        <p>
          <b>4.</b><br/>
          Chúng tôi không phải chịu trách nhiệm đối với bất kỳ người dùng nào về bất kỳ sự thiếu chính xác, sự thiếu tính tin cậy, sai sót, gián đoạn, sự đúng lúc, tính hoàn thiện, sự xóa bỏ, khuyết điểm, mất hiệu năng, virus máy tính, trục trặc đường truyền Internet, sự thay đổi hay việc sử dụng bất kỳ thông tin nào ở đây, vì bất kỳ nguyên nhân gì, đối với bất kỳ thiệt hại nào.
        </p>

        <p>
          <b>5.</b><br/>
          Trong bất kỳ trường hợp nào, chúng tôi sẽ không chịu trách nhiệm về bất cứ mất mát, thiệt hại, trách nhiệm hoặc phí tổn mang lại do việc sử dụng thông tin của người dùng đăng trên trang web này. Việc sử dụng thông tin trên trang web này là hoàn toàn tùy thuộc vào người dùng và người dùng chấp nhận mọi rủi ro liên quan đến việc sử dụng đó.
        </p>

        <p>
          <b>6.</b><br/>
          Người sử dụng chấp thuận bảo đảm không có bất kỳ hành động nào cũng như yêu cầu nào về các thiệt hại, mất mát, trách nhiệm và phí tổn (bao gồm cả phí trả cho luật sư) xuất phát từ việc sử dụng thông tin từ của người dùng.
        </p>

        <p>
          <b>7.</b><br/>
          Chúng tôi có thể bổ sung, thay đổi, cải tiến hoặc cập nhật các tính năng trên trang web này mà không cần báo trước.
        </p>

        <p>
          <b>8.</b><br/>
          Chúng tôi có quyền xóa bỏ, khóa, tạm ngưng bất kỳ hồ sơ người dùng nào mà chúng tôi xét thấy không phù hợp trên trang web hay vì bất cứ lý do nào.
        </p>

        <p>
          <b>9.</b><br/>
          Chúng tôi có quyền ngưng cung cấp bất kỳ tính năng nào đối với bất kỳ người dùng nào mà chúng tôi xét thấy cần thiết hay vì bất cứ lý do nào.
        </p>

        <p>
          <b>10.</b><br/>
          Nếu người sử dụng không đồng ý với bất kỳ điều khoản sử dụng trên thì phương thức duy nhất người dùng nên thực hiện là chấm dứt sử dụng thông tin trên trang web này và chấm dứt sử dụng trang web này.
        </p>
      </div>
      @endif
    </div>

    <div class="col-sm-4" style="margin-top: 20px;">
      <div class="panel panel-default">
        <div class="panel-heading" style="font-weight: bold; background-color: #f5f5f5;">
          Quy Định & Pháp Lý
        </div>
        <div class="list-group">
          <a href="{{ route('ehenho.terms') }}" class="list-group-item active">
            <i class="fa fa-file-text-o"></i> Điều khoản sử dụng
          </a>
          <a href="{{ route('ehenho.privacy') }}" class="list-group-item">
            <i class="fa fa-lock text-muted"></i> Chính sách bảo mật
          </a>
          <a href="{{ route('ehenho.about') }}" class="list-group-item">
            <i class="fa fa-question-circle text-muted"></i> Trợ giúp & Giới thiệu
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
