<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news')->insert(
            [
                [
                    'kind_of_news_id' => 2,
                    'new_categories_id' => 4,
                    'title' => 'Rap Việt tập 15',
                    'slug' => Str::slug('Rap Việt tập 15', '-'),
                    'description' => 'Team karit vào chung kết',
                    'content' => 'Trước quyết định này của JustaTee, Suboi đã gửi lời cảm ơn chân thành vì đã chọn TLinh – nữ thí sinh mà Suboi đánh giá chính là tương lai của thế hệ rap Việt Nam. JustaTee cho biết thêm: “Nếu không cứu bạn ấy bây giờ thì sẽ rất khó, vì có thể sẽ còn rất lâu mới có thể tìm được một bạn có tài năng, tố chất như TLinh. Người con gái ấy đại diện cho "Rap Việt" và chứng tỏ được phụ nữ vẫn luôn là số 1” .

                        Về phần Rhymastic, anh đã quyết định trao nón vàng của mình cho Lăng LD – đội Wowy. Anh chia sẻ: “Với chiếc mũ này, anh muốn dùng nó thật hữu ích và anh sẽ dùng nó cho người duy nhất làm anh rơi nước mắt trong chương trình này”.
                        
                        Sau 4 tập đầy kịch tính của vòng Bứt phá, 8 gương mặt sẽ xuất hiện trong chung kết "Rap Việt" 2020 chính thức được gọi tên là: GDucky, Ricky Star, RPT MCK của đội Karik; Thành Draw, RPT Gonzo thuộc đội Binz; đội Wowy với Lăng LD, Dế Choắt và cuối cùng chính là TLinh đội Suboi.
                        
                        Tập 15 - tập đầu tiên của vòng Chung kết "Rap Việt" sẽ lên sóng lúc 20h Thứ 7 – 7.11 trên kênh truyền hình HTV2.',
                    'post_image' => 'Rap-Viet-1.jpg'
                ],
                [
                    'kind_of_news_id' => 4,
                    'new_categories_id' => 1,
                    'title' => 'Game liên minh huyền thoại',
                    'slug' => Str::slug('Game liên minh huyền thoại', '-'),
                    'description' => 'SwordArt và SofM bật khóc, cả đội Suning như mất hồn sau thất bại Chung kết CKTG 2020',
                    'content' => 'Giải CKTG 2020 đã chính thức khép lại với ngôi vô địch thuộc về DAMWON Gaming. Nhưng bên cạnh niềm hân hoan của người chiến thắng cũng là nỗi buồn của những bại tướng. Sau khi trận Chung kết khép lại, toàn đội Suning gần như đã không thể kìm nén được cảm xúc buồn bã, thất vọng.

                        SwordArt đã bật khóc ngay trong buổi họp báo, trong khi SofM cũng không kìm nén được nước mắt, và các thành viên còn lại, bao gồm cả Ban huấn luyện, đều gục đầu tiếc nuối.
                        Mặc dù các fan hâm mộ đã an ủi rằng việc Suning vào được đến Chung kết đã là quá tốt rồi. Nhưng thực tế, đối với các tuyển thủ, thất bại trong trận đấu cuối cùng tranh ngôi vị vô địch luôn là một trải nghiệm không hề dễ chịu. Vậy nên, người hâm mộ SN và SofM khi chứng kiến những hình ảnh này có lẽ cũng không biết nói gì hơn ngoài việc gửi gắm sự tin tưởng và động viên, rằng: "Chúng ta sẽ trở lại mạnh mẽ vào năm sau!"

                        Đối với những thành viên của Suning, dù thất bại nhưng đây vẫn là một trải nghiệm quý giá đối với họ. 3/5 tuyển thủ trong đội hình chính của bầy sư tử là những tài năng trẻ và sát cánh cùng họ là 2 ngôi sao dày dặn kinh nghiệm và tài năng đã được minh chứng, đội hình này chắc chắn sẽ không dừng lại ở ngôi vị Á quân CKTG 2020 mà sẽ tiếp tục hướng tới mục tiêu lớn hơn ở những mùa giải sau.',
                    'post_image' => 'sofm.jpg'
                ],
                [
                    'kind_of_news_id' => 3,
                    'new_categories_id' => 6,
                    'title' => 'Bão số 9',
                    'slug' => Str::slug('Bão số 9', '-'),
                    'description' => 'Sau bão số 9, bão số 10 ảnh hưởng ra sao?',
                    'content' => 'Thông tin tại cuộc họp ứng phó mưa lũ diễn ra sáng nay 29-10, ông Hoàng Phúc Lâm - phó giám đốc Trung tâm Dự báo khí tượng thủy văn quốc gia - cho biết lúc 4h sáng nay, bão đang ở kinh tuyến 137, cách biển Đông gần 2.000km.

                        Các dự báo cho thấy khoảng sáng 1-11 bão có thể vào Biển Đông. Trung tâm Dự báo khí tượng thủy văn quốc gia dự kiến ngày 30-10 sẽ phát tin về cơn bão này. 
                        
                        Dự báo xa cho thấy bão Goni có khả năng ảnh hưởng Trung Bộ vào tuần sau. Tuy nhiên từ mai 30-10, không khí lạnh đang dồn xuống khá mạnh nên khi bão Goni vào gần Biển Đông sẽ có tương tác với không khí lạnh. Khi đó, diễn biến của cơn bão tương đối phức tạp.
                        
                        Các dự báo cho thấy khi vào Biển Đông, cơn bão có xu hướng di chuyển hướng lên phía Bắc, gần khối không khí lạnh. Do đó dự báo mưa ở Trung Bộ trong nửa đầu tháng 11 còn phức tạp.
                        
                        Mô hình dự báo của Nhật Bản cho thấy đường đi của bão có sự "đánh võng" theo hướng tây nam từ vị trí nó hình thành, sau đó đổi hướng tây bắc khi vào Biển Đông và hướng vào các tỉnh miền Trung. 
                        
                        Tương tự, mô hình dự báo của Hải quân Hoa Kỳ cho thấy đỉnh điểm cơn bão này có thể đạt mức Cat.3 theo thang bão Saffir-Simpson với sức gió có thể đạt gần 200km/h vào ngày 31-10 ở gần Philippines. 
                        
                        Tuy nhiên khi vào Biển Đông, cơn bão này nhanh chóng giảm cấp, vào ngày 2-11 sức gió của cơn bão này giảm còn khoảng 120km/h khi còn cách rất xa đất liền nước ta.
                        
                        Theo các chuyên gia nhận định, cơn bão này có hướng đi và vị trí đổ bộ thấp hơn so với bão số 9 (Molave) và sức mạnh cũng không bằng. Nguyên nhân do không khí lạnh từ phía Bắc tràn xuống áp chế khiến vùng biển nó đi qua bị khô lạnh và giảm dần năng lượng. 
                        
                        Dự báo nếu cơn bão này vào đất liền có thể đổ bộ tại khu vực từ Phú Yên đến Nha Trang với cấp gió khoảng cấp 7-8 (50 - 75km/h).
                        
                        Cùng thời điểm áp thấp nhiệt đới trên mạnh lên thành bão số 10, trên khu vực Thái Bình Dương sẽ xuất hiện thêm một số vùng thấp, trong đó một vùng sẽ mạnh lên thành bão nhưng hướng di chuyển có xu hướng vào khu vực Đài Loan.',
                    'post_image' => 'bao-so9.jpg'
                ],
            ]
        );
    }
}
