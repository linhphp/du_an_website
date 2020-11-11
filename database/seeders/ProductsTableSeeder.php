<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::upsert(
            [
                [
                    'brand_id' => 8,
                    'category_id' => 3,
                    'name' => 'OPPO A31 (6GB/128GB)',
                    'image1' => 'oppo-a31-2020-128gb-trang-1-org.jpg',
                    'image2' => 'oppo-a31-2020-128gb-trang-4-org.jpg',
                    'desc' => 'OPPO A31 2020 (6GB/128GB) - Smartphone gây ấn tượng với bộ 3 camera sau trứ danh OPPO, hiệu năng tốt kết hợp nhiều nâng cấp đáng kể về thiết kế trên giá thành phải chăng phù hợp với đại đa số người dùng.',
                    'price' => 4790000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Cáp, Sạc, Ốp lưng, Cây lấy sim'
                ],
                [
                    'brand_id' => 8,
                    'category_id' => 3,
                    'name' => 'OPPO Reno4',
                    'image1' => 'oppo-reno4-xanh-duong-1-org.jpg',
                    'image2' => 'oppo-reno4-xanh-duong-5-org.jpg',
                    'desc' => 'OPPO Reno4 - Chiếc điện thoại có thiết kế thời thượng, hiệu năng mạnh mẽ cùng bộ 4 camera siêu ấn tượng, tối ưu hóa cho chụp ảnh và quay phim siêu sắc nét, hứa hẹn sẽ là sản phẩm đáng để nâng cấp của hãng OPPO trong năm nay.
                        Thiết kế mới, hiện đại và ấn tượng 
                        Đầu tiên, OPPO Reno 4 có sự nâng cấp toàn diện so với người anh em Reno3, khi sử dụng chất liệu nhôm nguyên khối và được bọc kính cường lực Gorilla Glass 3 ở phần mặt trước và vỏ nhựa giả kính mặt lưng góp phần tăng độ cứng cáp lẫn nét sang trọng cho máy. 

                        Tiếp đến là màn hình hyperbol kích thước 6.4 inch có phần viền benzel được làm siêu mỏng, độ phân giải Full HD+ (1080 x 2400 Pixels) trên nền màu AMOLED mang đến chất lượng hình ảnh rõ nét, sống động, trải nghiệm giải trí chơi game trên thiết bị này sẽ cực lỳ thích.',
                    'price' => 8190000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Cáp, Sạc, Ốp lưng, Cây lấy sim'
                ],
                [
                    'brand_id' => 7,
                    'category_id' => 3,
                    'name' => 'Vsmart Aris (8GB/128GB)',
                    'image1' => 'vsmart-aris-8gb-128gb-xanhla-1-org.jpg',
                    'image2' => 'vsmart-aris-8gb-128gb-xanhla-4-org.jpg',
                    'desc' => 'Đặc điểm nổi bật của Vsmart Aris (8GB/128GB)

                        Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Miếng dán màn hình, Ốp lưng

                        Dạo gần đây, Vsmart đang dần khẳng định vị thế, tên tuổi của mình trên thị trường smartphone Việt Nam. Và Vsmart Aris 8GB/128GB là sản phẩm mà Vsmart muốn giới thiệu đến người dùng hàng loạt các tính năng hấp dẫn, xịn sò trên thiết bị này.
                        Thiết kế tinh tế, sang trọng
                        Phần thiết kế của Vsmart Aris có độ hoàn thiện cao với phần khung viền kim loại và mặt lưng là một lớp kính phủ nhám tốt giúp chống bám mồ hôi, dấu vân tay hiệu quả.',
                    'price' => 7490000,
                    'discount' => 6,
                    'quantity' => rand(1,10),
                    'accessories' => 'Cáp, Sạc, Ốp lưng, Cây lấy sim'
                ],
                [
                    'brand_id' => 7,
                    'category_id' => 3,
                    'name' => 'Vsmart Active 3 (6GB/64GB)',
                    'image1' => 'vsmart-active-3-6gb-xanh-1-org.jpg',
                    'image2' => 'vsmart-active-3-6gb-xanh-4-org.jpg',
                    'desc' => 'Ra mắt vào đầu năm 2020, Vsmart Active 3 (4GB/64GB) là một smartphone có hiệu năng ổn định, thời lượng pin cả ngày dài và còn nhiều tính năng đặc biệt khác nữa, hứa hẹn sẽ mang đến cho bạn một thiết bị công nghệ chẳng những thời trang còn rất hiện đại.
                        Sang trọng với mặt lưng kính, hiệu ứng gradient thời thượng
                        Mặt sau của Active 3 gồm 4 sự lựa chọn thời trang: Xanh lục bảo, Xanh sapphire, Đen thạch anh và Tím ngọc lấy cảm hứng từ vẻ đẹp của đá quý. Thiết kế cong nhẹ về hai cạnh và 4 góc được bo tròn mềm mại, Active 3 được hoàn thiện theo xu hướng gradient – bóng bẩy và chuyển màu khi di chuyển.',
                    'price' => 3990000,
                    'discount' => 10,
                    'quantity' => rand(1,10),
                    'accessories' => 'Cáp, Sạc, Ốp lưng, Cây lấy sim'
                ],
                [
                    'brand_id' => 2,
                    'category_id' => 3,
                    'name' => 'IPhone 11 64GB',
                    'image1' => 'iphone-11-do-1-1-org.jpg',
                    'image2' => 'iphone-11-do-4-1-org.jpg',
                    'desc' => 'Sau bao nhiêu chờ đợi cũng như đồn đoán thì cuối cùng Apple đã chính thức giới thiệu bộ 3 siêu phẩm iPhone 11 mạnh mẽ nhất của mình vào tháng 9/2019. Có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như chiếc iPhone Xr năm ngoái, đó chính là phiên bản iPhone 11 64GB.
                        Nâng cấp mạnh mẽ về camera
                        Nói về nâng cấp thì camera chính là điểm có nhiều cải tiến nhất trên thế hệ iPhone mới.',
                    'price' => 19990000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Cáp, Sạc, Cây lấy sim'
                ],
                [
                    'brand_id' => 2,
                    'category_id' => 3,
                    'name' => 'IPhone 11 Pro Max 512GB',
                    'image1' => 'iphone-11-pro-max-512gb-mau-bac-1-org.jpg',
                    'image2' => 'iphone-11-pro-max-512gb-mau-bac-4-org.jpg',
                    'desc' => 'Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 512GB mới ra mắt trong năm 2019 của Apple.
                        Hiệu năng "đè bẹp" mọi đối thủ
                        iPhone 11 Pro Max 512GB năm nay sử dụng chip Apple A13 Bionic mới nhất, nhanh và tiết kiệm điện hơn so với A12 năm ngoái dễ dàng giúp điện thoại chơi game tốt và mượt mà ở mức cấu hình max setting mà không phải lo về vấn đề giật lag.',
                    'price' => 38990000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Cáp, Sạc, Cây lấy sim'
                ],
                [
                    'brand_id' => 1,
                    'category_id' => 3,
                    'name' => 'Samsung Galaxy Note 20 Ultra',
                    'image1' => 'samsung-galaxy-note-20-ultra-1-org.jpg',
                    'image2' => 'samsung-galaxy-note-20-ultra-4-org.jpg',
                    'desc' => 'Sau Galaxy Note 20 thì Galaxy Note 20 Ultra là phiên bản tiếp theo cao cấp hơn thuộc dòng Note 20 Series của Samsung, với nhiều thay đổi từ cụm camera hỗ trợ lấy nét laser AF cùng ống kính góc rộng mới, màn hình tràn viền lên đến 6.9 inch chắc chắn sẽ là chiếc điện thoại được săn đón của fan yêu thích công nghệ.
                        Màn hình 2K+ Dynamic AMOLED 2X tràn viền hoàn hảo, thiết kế thời thượng
                        Màn hình tràn viền góc cạnh tối đa, kế thừa những đặc tính từ thế hệ trước, công nghệ màn hình Dynamic AMOLED 2X cho gam màu chính xác chuẩn điện ảnh cho bạn những trải nghiệm những thước phim chân thật trên chính smartphone của mình.

                        Ngoài ra, bằng cách giảm thiểu tối đa ánh sáng xanh gây hại, Dynamic AMOLED 2X còn giúp hạn chế tình trạng mỏi mắt giúp tối ưu trải nghiệm của người dùng.',
                    'price' => 29990000,
                    'discount' => 16,
                    'quantity' => rand(1,10),
                    'accessories' => 'Cáp, Sạc, Cây lấy sim'
                ],
                [
                    'brand_id' => 4,
                    'category_id' => 3,
                    'name' => 'Lenovo IdeaPad',
                    'image1' => 'lenovo-ideapad-s145-81w8001xvn-a4-216292-600x600.jpg',
                    'image2' => 'lenovo-ideapad-s145-15iil-i3-1005g1-4gb-256gb-win1-1-org.jpg',
                    'desc' => 'Laptop Lenovo IdeaPad S145 15IIL i3 (81W8001XVN) thuộc phân khúc laptop học tập văn phòng cơ bản với mức giá tốt. Máy có cấu hình ổn, đủ chạy các ứng dụng văn phòng phổ biến, điểm nổi bật của Lenovo IdeaPad S145 là ổ cứng SSD siêu nhanh, thiết kế mỏng gọn, tinh tế.
                        Thiết kế đơn giản, thời trang và tinh tế
                        Laptop  mang thiết kế cơ bản của dòng Lenovo IdeaPad S145 có ngoại hình đẹp mắt, lớp vỏ được làm bằng nhựa phủ sơn màu xám sang trọng với logo Lenovo được đặt gọn gàng sang một bên trên nắp lưng. Độ dày 17.9 mm, cân nặng 1.79 kg phù hợp với các bạn học sinh sinh viên, người thường xuyên di chuyển.',
                    'price' => 11490000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Thùng máy, Adapter sạc, Chuột không dây, Balo'
                ],
                [
                    'brand_id' => 4,
                    'category_id' => 1,
                    'name' => 'Lenovo IdeaPad S340',
                    'image1' => 'lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-8-214708-2-600x600.jpg',
                    'image2' => 'lenovo-ideapad-s340-14iil-i5-1035g1-8gb-512gb-win1-1-org.jpg',
                    'desc' => 'Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) là một lựa chọn phù hợp dành cho nhân viên văn phòng, học sinh sinh viên. Máy có cấu hình khá với vi xử lí mới nhất đến từ Intel, ổ cứng SSD cực nhanh, thiết kế sang trọng, mỏng nhẹ sẵn sàng đồng hành cùng bạn mọi lúc mọi nơi.
                        Sử dụng văn phòng, đồ họa
                        Với chip Intel Core i5 thế hệ 10 (ra mắt cuối năm 2019) mạnh mẽ, RAM 8 GB, ngoài việc sử dụng tốt các ứng dụng văn phòng, laptop còn có thể xử lý hình ảnh trên Photoshop, hay chỉnh sửa video đơn giản bằng Premiere.',
                    'price' => 15590000,
                    'discount' => 6,
                    'quantity' => rand(1,10),
                    'accessories' => 'Thùng máy, Adapter sạc, Chuột không dây, Balo'
                ],
                [
                    'brand_id' => 5,
                    'category_id' => 1,
                    'name' => 'Dell Inspiron 5593 i5',
                    'image1' => 'dell-inspiron-5593-i5-1035g1-8gb-256gb-2gb-mx230-w-213570-600x600.jpg',
                    'image2' => 'dell-inspiron-5593-i5-1035g1-8gb-256gb-2gb-mx230-w-bac-1-org.jpg',
                    'desc' => 'Laptop Dell Inspiron 5593 nằm ở phân khúc laptop cao cấp, là trợ thủ công nghệ đắc lực dành cho những doanh nhân khi sở hữu chiếc laptop có màn hình lớn, thiết kế tinh tế, thời trang và hiệu năng cực đỉnh.
                        Thiết kế sang trọng
                        Laptop Dell Inspiron 5593 sở hữu ngoại hình với lớp vỏ nhựa màu bạc thanh lịch, thời trang, hoàn thiện chắc chắn và vát mỏng đều ở các góc cạnh. Tuy nhiên, trọng lượng máy lên đến 2.05 kg, không quá nặng đối với những ai phải thường xuyên mang laptop ra ngoài làm việc.',
                    'price' => 17590000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Thùng máy, Adapter sạc, Chuột không dây, Balo'
                ],
                [
                    'brand_id' => 5,
                    'category_id' => 1,
                    'name' => 'Dell Vostro 5490 i7',
                    'image1' => 'dell-vostro-5490-i7-70223128-095120-105108-600x600.jpg',
                    'image2' => 'dell-vostro-5490-i7-70223128-1-org.jpg',
                    'desc' => 'Laptop Dell Vostro 5490 i7 (70223128) với ngoại hình sang trọng, đẳng cấp và mỏng nhẹ, cấu hình mạnh mẽ bởi hệ vi xử lí tân tiến nhất đáp ứng nhu cầu di chuyển và làm việc của giới văn phòng và doanh nhân.
                        Thiết kế mỏng nhẹ, sang trọng từ vỏ kim loại
                        Laptop Dell được thiết kế từ lớp vỏ bằng nhôm nên cứng cáp và bền bỉ hơn rất nhiều. Thân máy được hoàn thiện tỉ mỉ, hướng đến sự tiện dụng.

                        Chiếc máy có trọng lượng chỉ 1.49 kg, dày 18.3 mm có thể thoải mái đem theo đi làm, đi công tác hay dễ dàng nâng máy chỉ bằng một tay. ',
                    'price' => 22490000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Thùng máy, Adapter sạc, Chuột không dây, Balo'
                ],
                [
                    'brand_id' => 6,
                    'category_id' => 1,
                    'name' => 'Asus VivoBook A412FA i5',
                    'image1' => 'asus-vivobook-a412fa-i5-ek738t-217509-600x600.jpg',
                    'image2' => 'asus-vivobook-a412fa-i5-ek738t-1-org.jpg',
                    'desc' => 'Laptop ASUS VivoBook A412FA i5 (EK738T) là mẫu laptop văn phòng, sinh viên mỏng nhẹ, có cấu hình khỏe với CPU Intel thế hệ mới nhất. Ngoài ra máy còn sở hữu ổ cứng SSD 512 GB siêu nhanh và cảm biến vân tay giúp mở khóa tiện lợi, bảo mật cao.
                        Vẻ ngoài gọn gàng, màu sắc thanh lịch
                        Thiết kế của A412FA chắc chắn sẽ làm bạn hài lòng bởi sự trẻ trung, màu sắc sang trọng của nó.

                        Kích thước nhỏ gọn của ASUS VivoBook A412FA sẽ không chiếm quá nhiều diện tích trên bàn làm việc của bạn, độ mỏng 19.5 mm, trọng lượng 1.406 kg dễ dàng cho vào balo và đem theo bất cứ lúc nào bạn cần.',
                    'price' => 16190000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' => 'Thùng máy, Adapter sạc, Chuột không dây, Balo'
                ],
                [
                    'brand_id' => 6,
                    'category_id' => 1,
                    'name' => 'Asus VivoBook X409JA i3',
                    'image1' => 'asus-x409ja-i3-ek015t-220526-2-600x600.jpg',
                    'image2' => 'asus-x409ja-i3-ek015t-1-org.jpg',
                    'desc' => 'Laptop ASUS VivoBook X409JA i3 (EK015T) là mẫu laptop học tập - văn phòng được thiết kế gọn nhẹ, sử dụng vi xử lí thế hệ 10 và ổ cứng SSD 512 GB cho hiệu năng vượt trội trong phân khúc.
                        Vi xử lí thế hệ 10 
                        ASUS VivoBook sử dụng con chip Core i3 1005G1 có nhiều cải tiến về hiệu năng lẫn tốc độ xử lí so với thế hệ cũ.

                        RAM 4 GB đa nhiệm ở mức khá, bạn có thể vừa nghe nhạc vừa làm việc trên Word mà không xảy ra hiện tượng đứng máy. 

                        Với cấu hình này, bạn có thể sử dụng mượt mà các tác vụ thông thường như xem phim, lướt web, dùng các ứng dụng văn phòng phổ biến.',
                    'price' => 11590000,
                    'discount' => 4,
                    'quantity' => rand(1,10),
                    'accessories' => 'Thùng máy, Adapter sạc, Chuột không dây, Balo'
                ],
                [
                    'brand_id' => 3,
                    'category_id' => 2,
                    'name' => 'iPad Mini 7.9 wifi',
                    'image1' => 'ipad-mini-79-inch-wifi-2019-vang-1-1-org.jpg',
                    'image2' => 'ipad-mini-79-inch-wifi-2019-vang-4-org.jpg',
                    'desc' => 'iPad Mini 7.9 inch Wifi Cellular 64GB (2019) đánh dấu sự trở lại mạnh mẽ của Apple trong phân khúc máy tính bảng nhỏ gọn, có thể dễ dàng mang theo bên mình.
                        Hiệu năng mạnh mẽ hàng đầu
                        iPad Mini 7.9 inch Wifi Cellular 64GB (2019) được Apple trang bị hiệu năng rất ấn tượng với con chip Apple A12 cùng RAM 3 GB và 64 GB bộ nhớ trong.',
                    'price' => 13990000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' =>'Cáp, Sạc'
                ],
                [
                    'brand_id' => 1,
                    'category_id' => 2,
                    'name' => 'Samsung Galaxy Tab S6 Lite',
                    'image1' => 'samsung-galaxy-tab-s6-lite-xanh-1-org.jpg',
                    'image2' => 'samsung-galaxy-tab-s6-lite-xanh-4-org.jpg',
                    'desc' => 'Sau thành công của Galaxy Tab S6, Samsung tiếp tục ra mắt Galaxy Tab S6 Lite để chinh chiến ở phân khúc máy tính bảng giá rẻ hơn. Thiết bị vẫn hỗ trợ bút S Pen thần thánh, thiết kế kim loại cao cấp và màn hình, âm thanh giải trí đỉnh cao.
                        Thiết kế thời thượng và cao cấp
                        Máy tính bảng Galaxy Tab S6 Lite sở hữu thiết ấn tượng với độ dày chỉ 7mm và trọng lượng siêu nhẹ 467g, giúp người dùng dễ dàng bỏ vào túi xách hay mang theo bất kì đâu.',
                    'price' => 9990000,
                    'discount' => 0,
                    'quantity' => rand(1,10),
                    'accessories' =>'Cáp, Sạc, Cây lấy sim'
                ]
            ],
            [
                'brand_id',
                'category_id',
                'name',
                'image1',
                'image2',
                'desc',
                'price',
                'discount',
                'quantity',
                'accessories'
            ]
        );
    }
}
