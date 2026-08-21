<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();



$cat = \App\Models\Category::where('slug', 'luong-y')->first();
if (!$cat) {
    echo "Category not found\n";
    exit;
}

$post = \App\Models\Post::updateOrCreate(
    ['slug' => 'luong-y-nguyen-duc-loi'],
    [
        'title' => 'LƯƠNG Y NGUYỄN ĐỨC LỢI',
        'category_id' => $cat->id,
        'status' => 'published',
        'author_id' => 1,
        'content' => '<p>Từ khi mới thành lập cho tới nay, Phòng chẩn trị luôn có sự bổ sung về số lượng cũng như nâng cấp trình độ của các cán bộ lương y, bác sỹ, y sỹ đồng thời luôn trang bị đầy đủ thiết bị khám chữa bệnh, bốc thuốc. Hiện phòng khám đã khai trương cơ sở 2 với trang thiết bị tân tiến, hiện đại để phục vụ tốt hơn cho bệnh nhân. Ngoài khám bệnh, kê toa, bốc thuốc, châm cứu,… hiện nay Phòng chẩn trị còn bổ sung thêm bấm nguyệt, chườm thuốc, xông thuốc. Những bài thuốc gia truyền của Phòng chẩn trị đã điều trị thành công cho mọi lứa tuổi nam, phụ, lão, ấu với nhiều loại bệnh khác nhau như : bệnh ngoại cảm, hô hấp, huyết mạch, bệnh về thần kinh, tiêu hóa, tiết niệu, gan mật, bệnh sinh dục, bệnh ngoài da… Trong các phương thuốc gia truyền của phòng khám thì phương thuốc điều trị cột sống, phương thuốc điều trị hiếm muộn là chủ đạo và được nhiều người biết đến. Hàng năm phòng chẩn trị điều trị hàng chục nghìn bệnh nhân và con số đó đang tăng cho đến thời điểm hiện nay. Đặc biệt Hồng Ân Đường đã vinh dự nhận được giải tôn vinh “Thương hiệu nghề truyền thống Việt Nam năm 2012”. Đây là một phần thưởng to lớn, góp phần động viên , khích lệ đội ngũ phấn đấu hơn nữa cho công tác chữa bệnh cứu người.</p>'
    ]
);

echo "Post created successfully ID: " . $post->id . "\n";
