<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn #{{ $order->order_number }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0; padding: 0; color: #000; background: #fff; line-height: 1.25; font-size: 10.5px;
        }
        .invoice-wrapper {
            width: 148mm; margin: 0 auto; padding: 8mm; box-sizing: border-box;
        }
        .header {
            display: flex; justify-content: space-between; align-items: flex-end;
            margin-bottom: 12px; border-bottom: 2px solid #000; padding-bottom: 6px;
        }
        .logo-box h2 { margin: 0; font-size: 20px; font-weight: 800; }
        .company-info { text-align: right; font-size: 9.5px; }
        .company-info p { margin: 0; }
        
        .main-title { text-align: center; margin-bottom: 12px; }
        .main-title h1 { margin: 0; font-size: 22px; font-weight: 800; text-transform: uppercase; }
        .main-title p { margin: 2px 0; font-size: 10px; font-style: italic; }

        .meta-grid {
            display: grid; grid-template-columns: 1.2fr 1fr 1.1fr; gap: 10px;
            margin-bottom: 12px; border: 1.5px solid #000; padding: 10px;
        }
        .meta-box h3 { margin: 0 0 4px 0; font-size: 8.5px; text-transform: uppercase; border-bottom: 1px solid #000; padding-bottom: 2px; }
        .meta-box p { margin: 1px 0; font-size: 10.5px; font-weight: 700; }

        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        .items-table th { border: 1.5px solid #000; padding: 6px; font-size: 9.5px; background: #f2f2f2; text-transform: uppercase; }
        .items-table td { padding: 6px; border: 1px solid #000; font-size: 10.5px; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        .summary-box { margin-left: auto; width: 220px; }
        .summary-row { display: flex; justify-content: space-between; padding: 2px 0; font-size: 11px; }
        .summary-row.total { border-top: 1.5px solid #000; margin-top: 5px; padding-top: 5px; font-size: 16px; font-weight: 800; }

        .money-text { margin: 12px 0; padding: 8px; border: 1px dashed #000; font-style: italic; font-size: 11px; }

        .signatures { display: grid; grid-template-columns: 1fr 1fr 1fr; text-align: center; margin-top: 15px; }
        .sig-box h4 { margin: 0; font-size: 11px; text-transform: uppercase; font-weight: 800; }
        .sig-box p { margin: 3px 0; font-size: 9px; font-style: italic; }
        .sig-space { height: 45px; }

        .footer-note { text-align: center; margin-top: 15px; font-size: 10px; border-top: 1px solid #000; padding-top: 8px; }

        .print-btn { position: fixed; top: 15px; right: 15px; padding: 8px 16px; background: #000; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-weight: 700; z-index: 9999; }

        @media print {
            body { background: #fff; }
            .invoice-wrapper { width: 148mm; padding: 5mm; border: none; }
            .print-btn { display: none; }
        }
        @page { size: A5; margin: 0; }
    </style>
</head>
<body>
    <button class="print-btn" onclick="window.print()">In Hóa Đơn</button>
    <div class="invoice-wrapper">
        <div class="header">
            <div class="logo-box">
                @php $logo = setting('site_logo'); @endphp
                @if($logo)
                    <img src="{{ asset($logo) }}" style="max-height: 40px; filter: grayscale(100%);">
                @else
                    <h2>{{ setting('site_name', 'VIETTIN MART') }}</h2>
                @endif
            </div>
            <div class="company-info">
                <p><strong>{{ strtoupper(setting('site_name', 'VIETTIN MART')) }}</strong></p>
                <p>Hotline: {{ setting('contact_phone', '0901.xxx.xxx') }}</p>
            </div>
        </div>

        <div class="main-title">
            <h1>HÓA ĐƠN BÁN HÀNG</h1>
            <p>Ngày {{ $order->created_at->format('d/m/Y') }} — Số phiếu: #{{ $order->order_number }}</p>
        </div>

        <div class="meta-grid">
            <div class="meta-box">
                <h3>Khách hàng</h3>
                <p>{{ $order->customer_name }}</p>
                <p style="font-size: 10px; font-weight: 400;">ĐT: {{ $order->customer_phone }}</p>
                <p style="font-size: 9px; font-weight: 400; line-height: 1.1;">Đ/c: {{ $order->shipping_address }}</p>
            </div>
            @if($order->agent)
            <div class="meta-box" style="border-left: 1.5px solid #000; padding-left: 8px; border-right: 1.5px solid #000; padding-right: 8px;">
                <h3>Cửa hàng</h3>
                <p>{{ $order->agent->name }}</p>
                <p style="font-size: 10px; font-weight: 400;">ĐT: {{ $order->agent->phone }}</p>
                <p style="font-size: 9px; font-weight: 400; line-height: 1.1;">Đ/c: {{ $order->agent->address }}</p>
            </div>
            @else
            <div class="meta-box"></div>
            @endif
            <div class="meta-box" style="text-align: right;">
                <h3>Thanh toán</h3>
                <p>PTTT: {{ strtoupper($order->payment_method) }}</p>
                <p style="font-size: 10px; font-weight: 400;">{{ $order->payment_status === 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th width="35">STT</th>
                    <th>Tên hàng hóa, dịch vụ</th>
                    <th width="40">ĐVT</th>
                    <th width="40">SL</th>
                    <th width="90">Đơn giá</th>
                    <th width="110">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>
                        <div style="font-weight: 700;">{{ $item->product_name }}</div>
                        @if($item->variant_label)<div style="font-size: 9px;">Phân loại: {{ $item->variant_label }}</div>@endif
                    </td>
                    <td class="text-center">Cái</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="width: 40%;">
                @if($order->customer_note)
                <p style="font-size: 10px; margin-top: 0;"><strong>Ghi chú:</strong> {{ $order->customer_note }}</p>
                @endif
            </div>
            <div class="summary-box">
                <div class="summary-row">
                    <span>Cộng tiền hàng:</span>
                    <span>{{ number_format($order->subtotal, 0, ',', '.') }}đ</span>
                </div>
                @if($order->discount > 0)
                <div class="summary-row">
                    <span>Chiết khấu / Giảm giá:</span>
                    <span>-{{ number_format($order->discount, 0, ',', '.') }}đ</span>
                </div>
                @endif
                <div class="summary-row">
                    <span>Phí vận chuyển:</span>
                    <span>+{{ number_format($order->shipping_fee, 0, ',', '.') }}đ</span>
                </div>
                <div class="summary-row total">
                    <span>TỔNG CỘNG:</span>
                    <span>{{ number_format($order->total, 0, ',', '.') }}đ</span>
                </div>
            </div>
        </div>

        @php
            function convert_number_to_words($number) {
                $dictionary = array(0=>'không',1=>'một',2=>'hai',3=>'ba',4=>'bốn',5=>'năm',6=>'sáu',7=>'bảy',8=>'tám',9=>'chín',10=>'mười',11=>'mười một',12=>'mười hai',13=>'mười ba',14=>'mười bốn',15=>'mười lăm',16=>'mười sáu',17=>'mười bảy',18=>'mười tám',19=>'mười chín',20=>'hai mươi',30=>'ba mươi',40=>'bốn mươi',50=>'năm mươi',60=>'sáu mươi',70=>'bảy mươi',80=>'tám mươi',90=>'chín mươi',100=>'trăm',1000=>'ngàn',1000000=>'triệu',1000000000=>'tỷ');
                if ($number == 0) return 'không';
                if ($number < 0) return 'âm ' . convert_number_to_words(abs($number));
                $string = "";
                if ($number < 21) $string = $dictionary[$number];
                elseif ($number < 100) { $tens = ((int)($number/10))*10; $units = $number%10; $string = $dictionary[$tens]; if($units) $string .= ' ' . ($units==1?'mốt':$dictionary[$units]); }
                elseif ($number < 1000) { $hundreds = $number/100; $remainder = $number%100; $string = $dictionary[(int)$hundreds].' trăm'; if($remainder) $string .= ' '.convert_number_to_words($remainder); }
                else { $baseUnit = pow(1000, floor(log($number, 1000))); $numBaseUnits = (int)($number/$baseUnit); $remainder = $number%$baseUnit; $string = convert_number_to_words($numBaseUnits).' '.$dictionary[$baseUnit]; if($remainder) $string .= ($remainder<100?' lẻ ':' ').convert_number_to_words($remainder); }
                return $string;
            }
            $amountInWords = convert_number_to_words($order->total) . ' đồng chẵn.';
        @endphp

        <div class="money-text">
            <strong>Bằng chữ:</strong> {{ ucfirst($amountInWords) }}
        </div>

        <div class="signatures">
            <div class="sig-box">
                <h4>Người mua hàng</h4>
                <p>(Ký tên)</p>
                <div class="sig-space"></div>
            </div>
            <div class="sig-box">
                <h4>Người giao hàng</h4>
                <p>(Ký tên)</p>
                <div class="sig-space"></div>
            </div>
            <div class="sig-box">
                <h4>Người lập hóa đơn</h4>
                <p>(Ký tên)</p>
                <div class="sig-space"></div>
            </div>
        </div>

        <div class="footer-note">
            <p>Kiểm tra kỹ hàng trước khi nhận. Cảm ơn quý khách đã mua sắm tại <strong>{{ setting('site_name', 'VietTin Mart') }}</strong>!</p>
        </div>
    </div>
</body>
</html>
