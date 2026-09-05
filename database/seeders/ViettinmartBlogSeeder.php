<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Project;
use App\Models\Taxonomy;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViettinmartBlogSeeder extends Seeder
{
    public function run(?int $projectId = null): void
    {
        $project = $projectId ? Project::find($projectId) : Project::where('code', 'viettinmart-eco')->first();
        if (! $project) {
            $this->command->error('Project viettinmart-eco not found');

            return;
        }

        $pId = $project->id;
        $tId = $project->tenant_id ?? 3;
        $authorId = User::where('email', 'admin@viettinmart.com')->value('id')
            ?? User::first()?->id;

        $this->command->info('1. Tạo các Chuyên mục bài viết (Blog Categories) cho VietTinMart...');

        $categoriesData = [
            [
                'name' => 'Mẹo Nhà Bếp & Bảo Quản',
                'slug' => 'meo-nha-bep-bao-quan',
                'description' => 'Bí quyết bảo quản thực phẩm tươi sống, hải sản và các mẹo vặt nấu nướng thông minh.',
                'order' => 1,
            ],
            [
                'name' => 'Món Ngon Mỗi Ngày',
                'slug' => 'mon-ngon-moi-ngay',
                'description' => 'Tổng hợp các công thức nấu ăn ngon, bổ dưỡng từ hải sản, thịt tươi và rau củ quả chuẩn vị.',
                'order' => 2,
            ],
            [
                'name' => 'Dinh Dưỡng & Sức Khỏe',
                'slug' => 'dinh-duong-suc-khoe',
                'description' => 'Kiến thức dinh dưỡng vàng, chế độ ăn sạch lành mạnh cho cả gia đình.',
                'order' => 3,
            ],
            [
                'name' => 'Tin Tức Thị Trường',
                'slug' => 'tin-tuc-thi-truong',
                'description' => 'Cập nhật tình hình thị trường nông sản, thủy hải sản sạch và các xu hướng tiêu dùng.',
                'order' => 4,
            ],
            [
                'name' => 'Kiến Thức & Tiêu Chuẩn VSATTP',
                'slug' => 'kien-thuc-vsattp',
                'description' => 'Quy chuẩn an toàn vệ sinh thực phẩm, tiêu chuẩn VietGAP, GlobalGAP và cấp đông IQF.',
                'order' => 5,
            ],
        ];

        $categoryMap = [];
        foreach ($categoriesData as $c) {
            $tax = Taxonomy::updateOrCreate(
                ['project_id' => $pId, 'taxonomy' => 'category', 'slug' => $c['slug']],
                [
                    'tenant_id' => $tId,
                    'name' => $c['name'],
                    'description' => $c['description'],
                    'order' => $c['order'],
                    'status' => 'published',
                ]
            );
            $categoryMap[$c['slug']] = $tax->id;
        }

        $this->command->info('2. Tạo các Thẻ bài viết (Blog Tags) cho VietTinMart...');

        $tagsData = [
            ['name' => 'Thực phẩm sạch', 'slug' => 'thuc-pham-sach'],
            ['name' => 'Hải sản tươi', 'slug' => 'hai-san-tuoi'],
            ['name' => 'Mẹo vặt', 'slug' => 'meo-vat'],
            ['name' => 'Rau củ hữu cơ', 'slug' => 'rau-cu-huu-co'],
            ['name' => 'Công thức nấu ăn', 'slug' => 'cong-thuc-nau-an'],
            ['name' => 'Bò Úc nhập khẩu', 'slug' => 'bo-uc-nhap-khau'],
            ['name' => 'Tôm thẻ chân trắng', 'slug' => 'tom-the-chan-trang'],
            ['name' => 'Dinh dưỡng', 'slug' => 'dinh-duong'],
            ['name' => 'An toàn thực phẩm', 'slug' => 'an-toan-thuc-pham'],
            ['name' => 'Cấp đông IQF', 'slug' => 'cap-dong-iqf'],
        ];

        $tagMap = [];
        foreach ($tagsData as $t) {
            $tax = Taxonomy::updateOrCreate(
                ['project_id' => $pId, 'taxonomy' => 'post_tag', 'slug' => $t['slug']],
                [
                    'tenant_id' => $tId,
                    'name' => $t['name'],
                    'status' => 'published',
                ]
            );
            $tagMap[$t['slug']] = $tax->id;
        }

        $this->command->info('3. Đồng bộ chuyên mục & thẻ cho các bài viết hiện hữu...');

        // Map existing 7 posts
        $existingPostMapping = [
            43 => [
                'cat' => 'dinh-duong-suc-khoe',
                'tags' => ['dinh-duong', 'rau-cu-huu-co', 'thuc-pham-sach'],
            ],
            44 => [
                'cat' => 'mon-ngon-moi-ngay',
                'tags' => ['cong-thuc-nau-an', 'rau-cu-huu-co', 'mẹo-vat'],
            ],
            45 => [
                'cat' => 'meo-nha-bep-bao-quan',
                'tags' => ['meo-vat', 'rau-cu-huu-co', 'an-toan-thuc-pham'],
            ],
            46 => [
                'cat' => 'tin-tuc-thi-truong',
                'tags' => ['thuc-pham-sach', 'rau-cu-huu-co'],
            ],
            47 => [
                'cat' => 'dinh-duong-suc-khoe',
                'tags' => ['dinh-duong', 'thuc-pham-sach'],
            ],
            48 => [
                'cat' => 'mon-ngon-moi-ngay',
                'tags' => ['cong-thuc-nau-an', 'bo-uc-nhap-khau'],
            ],
            49 => [
                'cat' => 'kien-thuc-vsattp',
                'tags' => ['hai-san-tuoi', 'an-toan-thuc-pham', 'cap-dong-iqf'],
            ],
        ];

        foreach ($existingPostMapping as $postId => $data) {
            $post = Post::where('project_id', $pId)->where('id', $postId)->first();
            if ($post) {
                // Xóa quan hệ cũ
                DB::table('term_relationships')->where('object_id', $post->id)->delete();

                // Gán category
                if (isset($categoryMap[$data['cat']])) {
                    DB::table('term_relationships')->insert([
                        'object_id' => $post->id,
                        'term_taxonomy_id' => $categoryMap[$data['cat']],
                        'order' => 0,
                    ]);
                }

                // Gán tags
                foreach ($data['tags'] as $tSlug) {
                    if (isset($tagMap[$tSlug])) {
                        DB::table('term_relationships')->insert([
                            'object_id' => $post->id,
                            'term_taxonomy_id' => $tagMap[$tSlug],
                            'order' => 0,
                        ]);
                    }
                }
            }
        }

        $this->command->info('4. Thêm 5 bài viết chuyên sâu mới cho VietTinMart...');

        $newArticles = [
            [
                'title' => 'Bí quyết chọn tôm thẻ chân trắng tươi ngon, chắc thịt cho bữa cơm gia đình',
                'slug' => 'bi-quyet-chon-tom-the-chan-trang-tuoi-ngon',
                'cat' => 'meo-nha-bep-bao-quan',
                'tags' => ['hai-san-tuoi', 'tom-the-chan-trang', 'meo-vat'],
                'thumbnail' => 'http://127.0.0.1:8000/media-files/01-1776049299.jpg',
                'excerpt' => 'Tôm thẻ chân trắng là món ăn quen thuộc nhưng không phải ai cũng biết cách chọn tôm còn tươi sống, không bị bơm tạp chất. Cùng bỏ túi các bí kíp từ chuyên gia VietTinMart.',
                'content' => '<p>Tôm thẻ chân trắng là một trong những loại thủy sản được ưa chuộng nhất trong bữa cơm gia đình Việt nhờ vị ngọt thanh, thịt dai mềm và giá trị dinh dưỡng cao. Tuy nhiên, việc chọn mua được những con tôm tươi ngon, không ngâm hóa chất hay bơm nước đòi hỏi người nội trợ phải có sự tinh ý.</p>
<h2>1. Quan sát phần đuôi và thân tôm</h2>
<p>Khi chọn tôm thẻ, bạn nên chọn những con có dáng thẳng hoặc cong tự nhiên. Tôm tươi thường có phần thân săn chắc, vỏ bóng loáng và trong suốt. Hãy chú ý kỹ phần đuôi tôm:</p>
<ul>
    <li><strong>Tôm tươi:</strong> Phần đuôi xếp lại với nhau, không bị xòe rộng.</li>
    <li><strong>Tôm ngâm nước hoặc bơm hóa chất:</strong> Đuôi thường xòe rộng như cánh quạt, thân tôm căng múp bất thường.</li>
</ul>
<h2>2. Kiểm tra độ đàn hồi và sự liên kết giữa đầu và thân</h2>
<p>Dùng ngón tay ấn nhẹ vào thân tôm để cảm nhận độ săn chắc. Nếu tôm còn tươi, thịt tôm sẽ đàn hồi ngay lập tức và không có cảm giác dính nhớt. Đặc biệt, phần đầu tôm phải gắn chặt vào thân, không bị lung lay hay rỉ nước nhờn.</p>
<h2>3. Màu sắc chân và mang tôm</h2>
<p>Chân tôm tươi phải có màu tự nhiên, gắn chặt vào thân và không bị thâm đen. Mang tôm sạch, không bị đen hay có mùi ươn ươn là dấu hiệu của tôm vừa được thu hoạch và bảo quản lạnh đạt chuẩn.</p>
<h2>4. Bảo quản tôm đúng chuẩn tại nhà</h2>
<p>Nếu chưa dùng ngay, bạn nên rửa sạch tôm với nước muối loãng, để ráo rồi chia nhỏ vào các hộp kín hoặc túi hút chân không trước khi đưa vào ngăn đông tủ lạnh. Tại <strong>VietTinMart</strong>, tôm thẻ được bảo quản theo công nghệ cấp đông nhanh IQF, giữ trọn 99% vị ngọt tươi như vừa mới vớt từ ao nuôi.</p>',
            ],
            [
                'title' => '5 công thức chế biến cá hồi phi lê đơn giản, chuẩn nhà hàng tại nhà',
                'slug' => '5-cong-thuc-che-bien-ca-hoi-phi-le-don-gian',
                'cat' => 'mon-ngon-moi-ngay',
                'tags' => ['cong-thuc-nau-an', 'hai-san-tuoi', 'dinh-duong'],
                'thumbnail' => 'http://127.0.0.1:8000/media-files/02-1776049299.jpg',
                'excerpt' => 'Cá hồi phi lê giàu Omega-3 và protein chất lượng cao. Khám phá 5 cách chế biến siêu nhanh: áp chảo sốt bơ chanh, sốt teriyaki, nướng măng tây chuẩn phong vị Âu.',
                'content' => '<p>Cá hồi phi lê không chỉ là thực phẩm thượng hạng giàu dinh dưỡng mà còn rất dễ chế biến. Với 5 công thức dưới đây, bạn hoàn toàn có thể tự tay làm nên những bữa tối sang trọng, thơm ngon chuẩn nhà hàng cho gia đình.</p>
<h2>1. Cá hồi áp chảo sốt bơ chanh</h2>
<p>Đây là món ăn kinh điển tôn vinh vị béo ngậy tự nhiên của cá hồi kết hợp cùng vị chua thanh dịu của chanh vàng:</p>
<ul>
    <li>Ướp cá hồi với chút muối biển, tiêu xay và dầu oliu trong 10 phút.</li>
    <li>Áp chảo mặt da cá trước với lửa vừa cho da giòn rụm trong 3-4 phút, sau đó lật mặt thịt áp chảo thêm 2 phút.</li>
    <li>Đun chảy bơ lạt, thêm nước cốt chanh vàng, tỏi băm và chút ngò tây rồi rưới lên miếng cá hồi vừa chín tới.</li>
</ul>
<h2>2. Cá hồi sốt Teriyaki kiểu Nhật</h2>
<p>Vị ngọt mặn đậm đà của sốt Teriyaki thấm đều vào từng thớ thịt cá hồi ăn kèm cơm trắng nóng hổi là sự lựa chọn số 1 cho các bé và cả gia đình.</p>
<h2>3. Cá hồi nướng giấy bạc măng tây</h2>
<p>Phương pháp bọc giấy bạc giúp giữ lại toàn bộ độ ẩm và dưỡng chất quý giá của cá hồi, măng tây giòn ngọt tự nhiên không bị khô cháy.</p>
<h2>4. Salad cá hồi sốt chanh leo</h2>
<p>Sự tươi mát của xà lách giòn, cà chua bi kết hợp cùng cá hồi áp chảo thái hạt lựu và sốt chanh leo thơm mát mang lại bữa ăn nhẹ thanh đạm, hỗ trợ giảm cân hiệu quả.</p>
<h2>5. Lưu ý quan trọng khi chọn mua cá hồi</h2>
<p>Nên chọn miếng cá hồi có màu cam tươi tự nhiên, các vân mỡ trắng phân bố đều, thớ thịt khô ráo và không có mùi lạ. Cá hồi tại VietTinMart luôn được kiểm định nghiêm ngặt về độ tươi sống và an toàn vệ sinh thực phẩm.</p>',
            ],
            [
                'title' => 'Quy trình cấp đông siêu tốc IQF – Giữ trọn 99% dưỡng chất hải sản tươi',
                'slug' => 'quy-trinh-cap-dong-sieu-toc-iqf-giu-tron-duong-chat',
                'cat' => 'kien-thuc-vsattp',
                'tags' => ['cap-dong-iqf', 'an-toan-thuc-pham', 'hai-san-tuoi'],
                'thumbnail' => 'http://127.0.0.1:8000/media-files/03-1776049299.jpg',
                'excerpt' => 'Công nghệ IQF (Individual Quickly Frozen) là gì và tại sao thực phẩm cấp đông IQF tại VietTinMart lại có chất lượng vượt trội so với thực phẩm đông lạnh thông thường?',
                'content' => '<p>Trong ngành công nghiệp bảo quản thực phẩm hiện đại, công nghệ cấp đông siêu tốc cá thể hóa <strong>IQF (Individual Quickly Frozen)</strong> được coi là bước đột phá giúp bảo tồn nguyên vẹn hương vị và cấu trúc tế bào của thủy hải sản tươi sống.</p>
<h2>1. Công nghệ cấp đông IQF hoạt động như thế nào?</h2>
<p>Khác với phương pháp đông lạnh truyền thống mất từ 12-24 giờ để đưa nhiệt độ thực phẩm xuống âm, công nghệ IQF sử dụng các luồng khí lạnh cực nhanh ở nhiệt độ từ -35°C đến -40°C để đông cứng từng cá thể sản phẩm chỉ trong vài phút.</p>
<h2>2. Vì sao IQF giữ trọn độ tươi ngon?</h2>
<ul>
    <li><strong>Không làm vỡ màng tế bào:</strong> Quá trình đông cực nhanh tạo ra các tinh thể đá siêu nhỏ, không phá vỡ màng tế bào của thịt tôm cá. Khi rã đông, thực phẩm không bị chảy nước dinh dưỡng.</li>
    <li><strong>Giữ nguyên hương vị và kết cấu thịt:</strong> Thịt cá hồi, tôm thẻ sau khi rã đông vẫn giữ được độ ngọt đậm, dai giòn như lúc vừa đánh bắt.</li>
    <li><strong>Tiện lợi khi sử dụng:</strong> Các cá thể sản phẩm không bị đóng dính thành tảng lớn, người dùng có thể dễ dàng lấy đúng định lượng cần nấu mà không phải rã đông toàn bộ.</li>
</ul>
<h2>3. Cam kết chất lượng từ VietTinMart</h2>
<p>Toàn bộ dòng sản phẩm tươi cấp đông tại hệ thống <strong>VietTinMart</strong> đều được xử lý và đóng gói trên dây chuyền IQF hiện đại, đảm bảo tiêu chuẩn xuất khẩu sang các thị trường khó tính như Nhật Bản, EU và Hoa Kỳ.</p>',
            ],
            [
                'title' => 'VietTinMart mở rộng chuỗi liên kết trang trại rau củ chuẩn VietGAP',
                'slug' => 'viettinmart-mo-rong-chuoi-lien-ket-trang-trai-vietgap',
                'cat' => 'tin-tuc-thi-truong',
                'tags' => ['thuc-pham-sach', 'rau-cu-huu-co', 'an-toan-thuc-pham'],
                'thumbnail' => 'http://127.0.0.1:8000/media-files/04-1776049299.jpg',
                'excerpt' => 'Nhằm đáp ứng nhu cầu tiêu dùng rau củ sạch ngày càng cao, VietTinMart đã chính thức ký kết hợp tác mở rộng vùng trồng hữu cơ và chuẩn VietGAP tại Lâm Đồng và ĐBSCL.',
                'content' => '<p>Nhằm đem đến nguồn thực phẩm an toàn, có nguồn gốc minh bạch cho hàng triệu gia đình Việt, <strong>VietTinMart</strong> vừa hoàn tất ký kết thỏa thuận hợp tác chiến lược cùng hơn 30 hợp tác xã nông nghiệp tại Lâm Đồng, Củ Chi và Đồng bằng sông Cửu Long.</p>
<h2>1. Kiểm soát chất lượng nghiêm ngặt từ nông trại đến bàn ăn</h2>
<p>Toàn bộ quy trình canh tác từ khâu chọn giống, nguồn nước tưới tiêu đến chăm sóc phân bón hữu cơ đều được đội ngũ kỹ sư nông nghiệp của VietTinMart giám sát chặt chẽ theo bộ tiêu chuẩn thực hành nông nghiệp tốt VietGAP.</p>
<h2>2. Hệ thống kho lạnh logistics đạt chuẩn vận chuyển</h2>
<p>Rau củ quả sau khi thu hoạch vào sáng sớm sẽ được sơ chế sạch sẽ, đóng gói tại nguồn và vận chuyển bằng xe lạnh chuyên dụng về các siêu thị VietTinMart ngay trong ngày, đảm bảo độ tươi mới và hàm lượng vitamin cao nhất.</p>
<h2>3. Truy xuất nguồn gốc bằng mã QR minh bạch</h2>
<p>Mỗi túi rau củ quả tại VietTinMart đều có dán tem mã QR truy xuất nguồn gốc. Khách hàng chỉ cần quét mã bằng điện thoại thông minh là có thể biết rõ nông trại canh tác, ngày thu hoạch và chứng nhận an toàn thực phẩm tương ứng.</p>',
            ],
            [
                'title' => 'Lợi ích vàng của Omega-3 từ hải sản đối với tim mạch và trí não',
                'slug' => 'loi-ich-vang-cua-omega-3-tu-hai-san',
                'cat' => 'dinh-duong-suc-khoe',
                'tags' => ['dinh-duong', 'hai-san-tuoi', 'thuc-pham-sach'],
                'thumbnail' => 'http://127.0.0.1:8000/media-files/01-1776049299.jpg',
                'excerpt' => 'Axit béo Omega-3 (EPA và DHA) có trong cá hồi, cá trích và các loại hải sản là chìa khóa bảo vệ hệ tim mạch khỏe mạnh, tăng cường trí nhớ và làm chậm quá trình lão hóa.',
                'content' => '<p>Axit béo Omega-3 là một nhóm chất béo thiết yếu mà cơ thể con người không thể tự tổng hợp được, buộc phải bổ sung thông qua chế độ ăn uống hằng ngày. Trong đó, nguồn Omega-3 dồi dào và dễ hấp thu nhất chính là từ các loại thủy hải sản.</p>
<h2>1. Bảo vệ sức khỏe hệ tim mạch</h2>
<p>Hàng loạt nghiên cứu y khoa đã chứng minh rằng việc duy trì khẩu phần ăn có hải sản từ 2-3 bữa/tuần giúp:</p>
<ul>
    <li>Giảm lượng mỡ máu Triglyceride từ 15-30%.</li>
    <li>Ổn định huyết áp và ngăn ngừa hình thành các cục máu đông nguy hiểm.</li>
    <li>Tăng cường nồng độ Cholesterol tốt (HDL) trong máu.</li>
</ul>
<h2>2. Phát triển trí não và tăng cường thị lực</h2>
<p>DHA chiếm tỷ lệ rất cao trong chất xám của não bộ và võng mạc mắt. Bổ sung đầy đủ Omega-3 giúp tăng khả năng tập trung, cải thiện trí nhớ ở người lớn tuổi và hỗ trợ phát triển não bộ tối ưu ở trẻ nhỏ.</p>
<h2>3. Các loại hải sản giàu Omega-3 bạn nên bổ sung</h2>
<p>Những loại hải sản có hàm lượng Omega-3 vượt trội hàng đầu bao gồm:</p>
<ul>
    <li><strong>Cá hồi:</strong> Khoảng 2.260 mg Omega-3 trong 100g phi lê.</li>
    <li><strong>Cá basa, cá thu:</strong> Nguồn cung cấp EPA và DHA dồi dào, kinh tế cho bữa ăn hằng ngày.</li>
    <li><strong>Tôm thẻ, mực tươi:</strong> Cung cấp protein tinh khiết, ít chất béo xấu và dồi dào khoáng chất vi lượng như Kẽm, Selen.</li>
</ul>
<p>Hãy bổ sung ngay các loại thủy hải sản tươi sạch từ <strong>VietTinMart</strong> vào thực đơn tuần này để bảo vệ sức khỏe toàn diện cho cả gia đình bạn!</p>',
            ],
        ];

        foreach ($newArticles as $article) {
            $post = Post::updateOrCreate(
                ['project_id' => $pId, 'slug' => $article['slug']],
                [
                    'tenant_id' => $tId,
                    'title' => $article['title'],
                    'post_type' => 'post',
                    'status' => 'published',
                    'featured_image' => $article['thumbnail'],
                    'excerpt' => $article['excerpt'],
                    'content' => $article['content'],
                    'published_at' => now()->subDays(rand(1, 30)),
                    'views' => rand(150, 1200),
                    'author_id' => $authorId,
                ]
            );

            // Xóa quan hệ cũ
            DB::table('term_relationships')->where('object_id', $post->id)->delete();

            // Gán category
            if (isset($categoryMap[$article['cat']])) {
                DB::table('term_relationships')->insert([
                    'object_id' => $post->id,
                    'term_taxonomy_id' => $categoryMap[$article['cat']],
                    'order' => 0,
                ]);
            }

            // Gán tags
            foreach ($article['tags'] as $tSlug) {
                if (isset($tagMap[$tSlug])) {
                    DB::table('term_relationships')->insert([
                        'object_id' => $post->id,
                        'term_taxonomy_id' => $tagMap[$tSlug],
                        'order' => 0,
                    ]);
                }
            }
        }

        $this->command->info('=== HOÀN TẤT SEED CHUYÊN MỤC, THẺ VÀ BÀI VIẾT BLOG VIETTINMART! ===');
    }
}
