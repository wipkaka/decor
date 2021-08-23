-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 23, 2021 lúc 12:25 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `phone`, `address`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, '0933792791', 'Dĩ An, Bình Dương, Việt Nam', 'valleypartystore@gmail.com', 'https://valleyparty.vn/upload/company/logo-15316341333.png', '2021-08-17 11:44:27', '2021-08-18 11:48:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `TenKhongDau` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(1, 'Trang trí sinh nhật bé trai', 'Trang-tri-sinh-nhat-be-trai', '2021-08-04 16:14:04', '2021-08-04 16:14:04'),
(2, 'Trang trí sinh nhật bé gái', 'Trang-tri-sinh-nhat-be-gai', '2021-08-04 16:14:04', '2021-08-04 16:14:04'),
(3, 'Trang trí thôi nôi', 'Trang-tri-thoi-noi', '2021-08-04 16:14:36', '2021-08-04 16:14:36'),
(4, 'Trang trí gia tiên', 'Trang-tri-gia-tien', '2021-08-04 16:14:36', '2021-08-04 16:14:36'),
(5, 'Trang trí khai trương', 'Trang-tri-khai-truong', '2021-08-04 16:14:46', '2021-08-04 16:14:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `content`, `created_at`, `updated_at`) VALUES
(1, 'vumai', '0569170764', 'Sp good', '2021-08-19 12:23:40', '2021-08-19 12:23:40'),
(2, 'admin', 'ádasdas', 'good', '2021-08-19 12:25:29', '2021-08-19 12:25:29'),
(3, 'admin', '0569170764', 'aaa', '2021-08-19 12:55:50', '2021-08-19 12:55:50'),
(4, '17521271', '0569170764', 'aaaa', '2021-08-19 12:57:42', '2021-08-19 12:57:42'),
(5, 'admin', '0569170764', 'asdasda', '2021-08-19 13:02:44', '2021-08-19 13:02:44'),
(6, 'admin', '0569170764', 'aaaa', '2021-08-19 13:03:14', '2021-08-19 13:03:14'),
(7, 'admin', '0569170764', ',msnfvysdgfoish', '2021-08-19 13:03:59', '2021-08-19 13:03:59'),
(8, 'vumai', '0569170764', '12364', '2021-08-19 13:04:59', '2021-08-19 13:04:59'),
(9, 'admin', '0569170764', 'dsadas', '2021-08-19 13:46:10', '2021-08-19 13:46:10'),
(10, 'admin', '0569170764', 'aaa', '2021-08-19 13:46:16', '2021-08-19 13:46:16'),
(11, 'admin', '0569170764', 'ádsadasdasdasdasd', '2021-08-19 13:46:28', '2021-08-19 13:46:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `idDanhmuc` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` varchar(5000) NOT NULL,
  `new` int(11) NOT NULL DEFAULT '0',
  `hinh` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `idDanhmuc`, `name`, `tomtat`, `noidung`, `new`, `hinh`, `view`, `created_at`, `updated_at`) VALUES
(28, 2, 'Trang trí thôi nôi sinh nhật tông màu nâu LEO-DIOR', 'Dịch vụ trang trí thôi nôi sinh nhật trọn gói chuyên nghiệp với tông màu nâu giá rẻ', '<p>Dịch vụ trang trí thôi nôi sinh nhật Xeko Decor thiết kế trang trí cho hai bé đáng yêu tại nhà.<br />\n<strong>TRANG TRÍ SINH NHẬT TÔNG MÀU NÂU</strong><br />\nLà tông màu được bình chọn hot nhất năm 2021 trong lĩnh vực decor tiệc sinh nhật. Bởi tông màu nâu này thích hợp cả bé trai và bé gái cũng như sinh nhật người lớn luôn. Thiết kế sinh nhật việc chọn tông màu rất quan trọng. Trọn mẫu từng chi tiết đều theo màu nhất định chọn sẵn từ trước từ backdrop đến bong bóng hay phụ kiện trang trí sinh nhật. Bé LEO và DIOR được mẹ trang trí sinh nhật tại nhà đảm bảo an toàn trong mùa dịch bệnh này. Tuy nhiên cũng đầu tư tỉ mỹ từ khâu chuẩn bị đến tổ chức tiệc sinh nhật tại nhà</p>\n\n<p style=\"margin-left:240px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"http://shop.test/public/tintuc/noidung/files/__thumbs/tt.jpg/tt__800x600.jpg\" style=\"float:left; height:600px; width:800px\" /></p>', 1, '0VcO_192994445_2981927052132556_4493987479269074999_n.jpg', 1235, '2021-08-11 08:23:18', '2021-08-17 10:51:40'),
(29, 2, 'Dịch vụ trang trí sinh nhật bé gái Pikachu', 'Trọn gói trang trí sinh nhật với chủ đề Pikachu màu vàng. Backdround sinh nhật được thiết kế với chibi bé gái đáng yêu.', '<p><span style=\"font-size:14px\"><strong>DỊCH VỤ TRANG TRÍ SINH NHẬT BÉ GÁI TÔNG MÀU VÀNG</strong></span><br />\nTrọn gói trang trí sinh nhật bé Khoai Tây với tông màu vàng dễ thương, đep và thiết kế background hình tròn viền bong bóng. Bong bóng trang trí sinh nhật được kết từ tông màu trắng vàng với nhau. Bé Khoai Tây tổ chức buổi tiệc sinh nhật tại nhà, có thêm bong bóng đính trần giả bay, ngoài ra còn có bong bóng thả sàn làm cho không gian sinh nhật được tôn vinh thêm phần dễ thương.</p>\n\n<p style=\"margin-left:320px\"><img alt=\"\" src=\"http://shop.test/public/tintuc/noidung/files/__thumbs/tt.jpg/tt__600x450.jpg\" style=\"height:450px; width:600px\" /></p>\n\n<p><strong><span style=\"font-size:14px\">TRỌN GÓI TRANG TRÍ SINH NHẬT CHO BÉ GÁI</span></strong></p>\n\n<ul>\n	<li>Trang trí sinh nhật bé gái</li>\n	<li>Trang trí background sinh nhật</li>\n	<li>Trang trí bong bóng sinh nhật</li>\n	<li>Trang trí không gian sinh nhật</li>\n	<li>Phụ kiện trang trí sinh nhật</li>\n	<li>Khung hình bé dùng trang trí sinh nhật bé gái</li>\n	<li>Trang trí sinh nhật bé gái tông màu vàng</li>\n</ul>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://shop.test/public/tintuc/noidung/files/__thumbs/tt.jpg/tt__600x450.jpg\" style=\"height:450px; width:600px\" /></p>\n\n<p><br />\n&nbsp;</p>', 1, '4PIa_tt_1628402999.jpg', 564, '2021-08-12 04:21:10', '2021-08-13 08:39:51'),
(30, 5, 'Trang trí khai trương Kiều-Linh', 'Trang trí khai trương tông màu trắng đơn giản\r\nDịch vụ trang trí khai trương đẹp tông màu trắng bạc\r\nTrang trí backdrop khai trương hình tròn viền bong bóng trắng', '<p><strong>DỊCH CỤ TRANG TRÍ KHAI TRƯƠNG CỬA HÀNG KIỀU LINH</strong></p>\n\n<p>Trang trí khai trương&nbsp;với tông màu trắng chủ đạo, thêm bong bóng jumbo lớn cho buổi khai trương đẹp mắt. Bong bóng trang trí khai trương backdrop tròn lần này là trắng tinh khôi kết hợp bạc lung linh. Trang trí khai trương đẹp sang trọng là một trong những tiêu chí được khách hàng yêu cầu và lựa chọn nhiều nhất hiện nay. Xeko Decor luôn có những mẫu trang trí khai trương đẹp phục vụi khách hàng mọi lúc mọi&nbsp; nơi.</p>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://shop.test/public/tintuc/noidung/files/__thumbs/trang-tri-khai-truong-6.jpg/trang-tri-khai-truong-6__600x450.jpg\" style=\"height:450px; width:600px\" /></p>', 1, 'aNYh_trang-tri-khai-truong-6.jpg', 16, '2021-08-12 04:26:48', '2021-08-12 04:48:17'),
(31, 4, 'Trang trí bàn thờ gia tiên tông màu đỏ', 'Dịch vụ trang trí bàn gia tiên hai họ tiệc cưới tại nhà TPHCM. Đẹp giá rẻ, sang trọng, nhiều mẫu khác nhau', '<p style=\"text-align:center\"><img alt=\"trang tri le gia tien (10)\" src=\"https://xekodecor.com/uploads/dich-vu/2017_10/trang-tri-le-gia-tien-10.jpg\" /></p>\n\n<p>Giới thiệu quý khách hàng mẫu<em><strong>&nbsp;trang trí gia tiên hai họ tại TPHCM với tông màu đỏ</strong></em><br />\nTRỌN GÓI BAO GỒM CÁC HẠNG MỤC:</p>\n\n<p><strong>01. &nbsp; &nbsp; Phông Voan Trắng , 1 lớp phông voan hoa hồng cao cấp, trang trí hoa giấy theo tone màu</strong><br />\n<strong>02. &nbsp; &nbsp;&nbsp;</strong><strong>Bộ bàn thờ: gồm bàn phủ voan hoa hồng cao cấp , bộ &nbsp;lư đồng, &nbsp;đế nến, bát nhang, chữ hỷ</strong><br />\n<strong>03. &nbsp; &nbsp;&nbsp;</strong><strong>Bộ bàn dài để mâm quả phủ voan hoa hồng cao cấp</strong><br />\n<strong>04. &nbsp; &nbsp;</strong><strong>Bộ bàn dài 2 họ phủ voan hoa hồng và 12 ghế nệm phủ voan hoa hồng</strong><br />\n<strong>05. &nbsp; &nbsp;02 bộ ấm tách ( 2 ấm, 12 ly, 14 đĩa )</strong><br />\n<strong>06. &nbsp; &nbsp;</strong><strong>05 &nbsp;bình bông lụa</strong><br />\n<strong>07. &nbsp;&nbsp;&nbsp;12 chai nước suối tag tên CD - CR</strong><br />\n<strong>08. &nbsp; &nbsp;</strong><strong>Cổng hoa lụa + bảng đính hôn - tân hôn - vu quy</strong><br />\n<strong>09. &nbsp;</strong><strong>&nbsp;&nbsp;</strong><strong>Bảng tên CD - CR dán tường</strong></p>', 1, 'TtHd_3.jpg', 651646, '2021-08-12 04:46:06', '2021-08-12 04:52:25'),
(32, 1, 'Dịch vụ trang trí sinh nhật khuyến mãi 300.000đ', 'Mẫu trang trí sinh nhật bé Trọng Phúc đang được khuyến mãi tặng bánh cupcake trị giá 300.000đ cho khách hàng. Dịch vụ trang trí sinh nhật bé trai đẹp giá rẻ.', '<h2>DỊCH VỤ TRANG TRÍ SINH NHẬT</h2>\n\n<p>Một<em><strong>&nbsp;mẫu trang trí sinh nhật&nbsp;</strong></em>quá đỗi thân thuộc tại Xeko Decor nay được cách tân với tông màu nâu nhẹ nhàng, tuy không nổi bật nhưng nó khoác lên mình sự sang trọng đến từ đất trời, được bình chọn là tông màu sang trọng nhất năm nay. Nhưng mẹ nào có gu thẩm mỹ cao sẽ khó bỏ qua&nbsp;<em><strong>mẫu trang trí sinh nhật bé trai&nbsp;</strong></em>này. Bạn đã có chuẩn bị gì cho buổi tiệc sinh nhật nhà mình chưa, nếu chưa, hãy để Xeko Decor quan tâm bạn bằng cách đưa ra nhiều mẫu background sinh nhật cho bạn lựa chọn và đưa ra ý tưởng nhé. Sau đây chúng ta cùng tham khảo mẫu trang trí sinh nhật bé Trọng Phúc tại nhà hàng sang trọng và đẹp.</p>\n\n<p style=\"margin-left:240px\"><img alt=\"trang tri thoi noi tong mau nau (3)\" src=\"https://xekodecor.com/uploads/dich-vu/2021_08/trang-tri-thoi-noi-tong-mau-nau-3.jpg\" style=\"height:600px; width:800px\" /></p>\n\n<p>Dịch vụ trang trí sinh nhật bé trai</p>\n\n<h2>TRỌN GÓI&nbsp;<a href=\"https://xekodecor.com/dich-vu.html\">TRANG TRÍ SINH NHẬT BÉ TRAI</a></h2>\n\n<ul>\n	<li><em><strong>Trang trí background sinh nhật:</strong></em>&nbsp;Phông màn vải voan trắng mềm mại tinh khôi, viền bóng bóng phía trên phông màn theo tông màu nâu kết hợp gam màu liên quan và kèm theo đó là đính chi tiết cánh quạt trắng thêm phần sáng tạo. Background sinh nhật có bảng tên bé xung quanh là kinh khí cầu và những chú heo con đáng yêu.</li>\n	<li><em><strong>Trang trí bàn gallery sinh nhật cho bé trai</strong></em>: Nhiều phụ kiện sinh nhật được sử dụng trong mẫu thiết kế lần này có thể kể đến những vật dụng chính như Khung hình bé, hình ảnh bé được thiết kế thành cây gắn ảnh, nón giấy sinh nhật, hộp quà, mô hình nickname bé được đặt phía trước và chính giữa bàn, bánh kẹo trang trí sinh nhật. Cây welcome, số 1, mô hình chủ đề như là những chú heo con ngộ nghĩnh. Còn có chibi bé trai đáng yêu nữa, được thiết kế bởi nhân viên Xeko Decor mỗi buổi tiệc sẽ được trang trí sinh nhật bởi chibi bé trai đẹp.</li>\n	<li><em><strong>Trang trí bong bóng</strong></em>&nbsp;còn có thêm hai trụ bong bóng hai bên bàn làm cho không gian sinh nhật trở nên rộng mở hơn thêm background chụp hình sinh nhật.&nbsp;</li>\n	<li>Khuyến mãi tặng chibi lớn trong tháng này cho khách hàng đặt mẫu trang trí sinh nhật bé trai.</li>\n</ul>\n\n<p style=\"margin-left:280px\"><img alt=\"trang tri thoi noi tong mau nau (5)\" src=\"https://xekodecor.com/uploads/dich-vu/2021_08/trang-tri-thoi-noi-tong-mau-nau-5.jpg\" style=\"height:600px; width:800px\" /></p>', 0, 'acER_trang-tri-thoi-noi-tong-mau-nau-4.jpg', 656, '2021-08-12 04:50:25', '2021-08-13 08:33:40'),
(33, 3, 'Trang trí thôi nôi bé trai chủ đề Phi Công-Khôi Vỹ', 'Dịch vụ trang trí thôi nôi sinh nhật trọn gói chuyên nghiệp tại TPHCM với chủ đề phi công. Trang trí thôi nôi giá rẻ khuyến mãi 300.000đ với bánh cupcake đẹp.', '<p><strong>DỊCH VỤ TRANG TRÍ THÔI NÔI BÉ TRAI-KHÔI VỸ</strong></p>\n\n<p>Với chủ đề phi công láy máy bay được làm trang trí thôi nôi bé trai. Xeko Decor sáng tạo nên một buổi tiệc sinh nhật tông màu xanh dương với bong bóng, background voan trắng và bàn gallary dễ thương cùng những phụ kiện trang trí sinh nhật đẹp ấn tượng.</p>\n\n<p style=\"text-align:center\"><img alt=\"Có thể là hình ảnh về dâu tây\" src=\"https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.6435-9/194146494_2981927102132551_6479560012159534527_n.jpg?_nc_cat=111&amp;ccb=1-4&amp;_nc_sid=8bfeb9&amp;_nc_ohc=SbFW9LcAE5EAX_Apdgr&amp;tn=tJMFOuIOHU_bfR1N&amp;_nc_ht=scontent.fsgn2-6.fna&amp;oh=869290c67ce230caab105dfaa61e1f01&amp;oe=613CEFFA\" /></p>\n\n<h2>TRANG TRÍ THÔI NÔI GIÁ RẺ CU TỦN</h2>\n\n<p>Nickname bé thật đáng yêu đậm chất trẻ thơ.&nbsp;<strong>Gói trang trí thôi nôi giá rẻ&nbsp;</strong>được nhiều khách hàng lựa chọn trong 3 năm qua tại Xeko Decor. Đơn giản chỉ là background và bàn gallery đầy đủ phụ kiện sinh nhật, sáng tạo nên nhiều chủ đề trang trí, và lần này chủ đề phi công được tỏa sáng trên nền voan trắng tinh khôi làm nền.</p>', 1, 'OlcE_sp.jpg', 1, '2021-08-13 08:04:43', '2021-08-14 05:20:54'),
(34, 1, 'Trang trí sinh nhật Minh Long Dola', 'Trang trí sinh nhật trọn gói chuyên nghiệp. Trang trí thôi nôi bé Minh Long Dola tông màu vàng.', '<p><strong>TRANG TRÍ SINH NHẬT BÉ MINH LONG</strong></p>\n\n<p>Trọn gói&nbsp;<strong>trang trí sinh nhật bé</strong>&nbsp;Minh Long được thực hiện bởi Xeko Decor. Tông màu vàng được chọn thành&nbsp;<strong>tông màu trang trí thôi nôi cho bé trai&nbsp;</strong>với chủ đề boss baby.</p>\n\n<p><strong>Dịch vụ trang trí sinh nhật giá rẻ&nbsp;</strong>chuyên nghiệp tại các quận của TPHCM, nhiều&nbsp;<strong><em>bảng giá trang trí sinh nhật</em></strong>&nbsp;cho khách hàng lựa chọn, đến với Xeko Decor bạn sẽ được tham khảo nhiều mẫu trang trí thôi nôi sinh nhật đẹp tuyệt vời.</p>\n\n<ul>\n	<li>Trang trí sinh nhật bé trai</li>\n	<li>Trang trí thôi nôi bé trai</li>\n	<li>Trang trí sinh nhật giá rẻ</li>\n	<li>Trang trí sinh nhật chủ đề boss baby</li>\n</ul>\n\n<p style=\"text-align:center\"><img alt=\"Có thể là hình ảnh về thực phẩm và trong nhà\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.6435-9/190705595_2981927058799222_5780168544631944851_n.jpg?_nc_cat=106&amp;ccb=1-4&amp;_nc_sid=8bfeb9&amp;_nc_ohc=6jRkJ-OyYuwAX9IvSEP&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=99978e42170c41cf52c927cd14e6453b&amp;oe=613D51B6\" /></p>\n\n<h2>TRANG TRÍ SINH NHẬT ĐẸP</h2>\n\n<p>Phụ kiện trang trí thôi nôi sinh nhật tông màu vàng được lựa chọn từ những món đồ ưng ý nhất, không thể thiếu là khung hình bé dùng trang trí sinh nhật tuyệt vời.</p>', 1, 'LDSP_190705595_2981927058799222_5780168544631944851_n.jpg', 100, '2021-08-13 08:07:36', '2021-08-13 08:41:24'),
(35, 5, 'Trang trí khai trương tông màu đen', '<p>Trang trí khai trương đẹp tông màu đen<br />\r\nDịch vụ trang trí khai trương quán cà phê<br />\r\nBackdrop khai trương đẹp với tông màu nâu trên background viền bong bóng</p>', '<p><em><strong>Dịch vụ trang trí khai trương đẹp&nbsp;</strong></em>chuyên nghiệp Xeko Decor giới thiệu&nbsp;<em><strong>mẫu backdrop trang trí khai trương</strong></em>&nbsp;tông màu đen được tạo thành từ hai background nhỏ viền bong bóng. Chúc mừng trang trí khai trương Hợp xù trong niềm hân hoan và chào đón của học viên bấy lâu nay. Bạn đã biết được các chương trình đào tạo tại đây chưa, nếu chưa được dự buổi khai trương này thì tham khảo&nbsp;<strong><em>mẫu trang trí tiệc khai trương&nbsp;</em></strong>này nhé.&nbsp;</p>\n\n<p style=\"text-align:center\"><img alt=\"Có thể là hình minh họa về thực phẩm\" src=\"https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.6435-9/192994445_2981927052132556_4493987479269074999_n.jpg?_nc_cat=102&amp;ccb=1-4&amp;_nc_sid=8bfeb9&amp;_nc_ohc=YBSUa6gargIAX-N6-xS&amp;_nc_ht=scontent.fsgn2-5.fna&amp;oh=06f69449969e184cff93fd9dfa68940f&amp;oe=613D4DA3\" /></p>\n\n<p>Cần những gì cho việc thực hiện một&nbsp;<em><strong>buổi lễ khai trương</strong></em>&nbsp;nhỉ, đó chính là bộ mặt của công ty hay chi nhánh, cửa hàng của mình. Điều đặt biệt là khách hàng sẽ rất nhiều và nên tạo ấn tượng lưu luyến trong&nbsp;<strong>ngày khai trương cửa hàng&nbsp;</strong>lần này. Được lựa chọn là đơn vị hàng đầu trong việc&nbsp;<em><strong>thiết kế trang trí khai trươn</strong></em>g. Xeko Decor cung cấp nhiều&nbsp;<em><strong>mẫu trang trí khai trương xịn xò&nbsp;</strong></em>giá cả phải chăng.</p>', 1, 'ERFd_192994445_2981927052132556_4493987479269074999_n.jpg', 2, '2021-08-13 08:10:52', '2021-08-17 10:52:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `hinh`, `created_at`, `updated_at`) VALUES
(1, 'shop.test', 'slide1.jpg', '2021-08-06 16:04:55', '2021-08-06 16:04:55'),
(2, 'shop.test', 'slide2.jpg', '2021-08-06 16:04:55', '2021-08-06 16:04:55'),
(3, 'shop.test', 'slide3.jpg', '2021-08-06 16:04:55', '2021-08-06 16:04:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ggmap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`id`, `phone`, `address`, `ggmap`, `created_at`, `updated_at`) VALUES
(1, '0933792791', '274 Lê Hồng Phong, Đông Chiêu, Dĩ An, Bình Dương', 'https://www.google.com/maps/place/274+L%C3%AA+H%E1%BB%93ng+Phong,+T%C3%A2n+%C4%90%C3%B4ng+Hi%E1%BB%87p,+D%C4%A9+An,+B%C3%ACnh+D%C6%B0%C6%A1ng,+Vi%E1%BB%87t+Nam/@10.9262804,106.7605926,17z/data=!3m1!4b1!4m5!3m4!1s0x3174d9af3fba598d:0x861369e0884c28b4!8m2!3d10.9262751!4d106.7627813?hl=vi-VN', '2021-08-18 11:59:32', '2021-08-18 13:52:46'),
(3, '0905317373', '133c Hoàng Hoa Thám, P. Tân Tiến, TP.Buôn Ma Thuột, T.Đăk Lăk', 'https://www.google.com/maps/search/133c+Ho%C3%A0ng+Hoa+Th%C3%A1m,+P.+T%C3%A2n+Ti%E1%BA%BFn,+TP.Bu%C3%B4n+Ma+Thu%E1%BB%99t,+T.%C4%90%C4%83k+L%C4%83k/@12.6766862,108.0243317,16z/data=!3m1!4b1', '2021-08-18 13:45:44', '2021-08-18 13:47:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `hinh`, `tomtat`, `noidung`, `created_at`, `updated_at`) VALUES
(5, '12 ý tưởng trang trí tiệc cưới đẹp, dễ thực hiện để ngày trọng đại thật khó quên', 'jmM8_tt.jpg', '<p><strong>Những ý tưởng trang trí tiệc cưới đẹp long lanh mà dễ thực hiện này chắc chắn sẽ mang đến ngày trọng đại của bạn những khoảnh khắc khó quên.</strong></p>', '<p>&nbsp;Điều đơn giản là bạn cần một khung background chụp ảnh<br />\n&nbsp; &nbsp;3 Trụ tròn trang trí<br />\n&nbsp; &nbsp;bong bóng<br />\nVật dụng trang trí khác<br />\n1. dựng khung backdrop<br />\n2.Bơm bong bóng theo tông màu bạn muốn<br />\n3.Setup 3 trụ như hình<br />\nBạn đã có được một không gian chụp ảnh thật đơn giản</p>', '2021-08-08 07:54:41', '2021-08-13 08:19:17'),
(6, 'SEO MAP 2020 Lĩnh vực trang trí sinh nhật', 'ytrw_192460245_2981927018799226_67441072274999423.jpg', '<p><strong>Cách Làm Địa chỉ bản đồ trên GG cho anh em Dịch vụ trang trí sinh nhật</strong></p>', '<p><strong>HƯỚNG DẪN SEO MAP CĂN BẢN</strong><br />\n<strong>1. Seo Google Map – Seo Local</strong><br />\nSEO Google Map hay còn gọi với cái tên là SEO Local, hay SEO địa điểm là việc bạn tác động bằng cách kỹ thuật nhằm đưa địa chỉ doanh nghiệp bạn lên TOP của công cụ tìm kiếm Google. Từ đó mang lại cho bạn một lượng lớn traffic và khách hàng (những khách hàng nhìn thấy và truy cập vào Map) giúp cho khả năng bán hàng của bạn tốt hơn và tiếp cận quảng bá thương hiệu trên Online của bạn tuyệt hơn.<br />\nMap của bạn nằm ở vị trí TOP cao không những sẽ giúp cho khách hàng dễ dàng tìm kiếm doanh nghiệp bạn hơn mà đó cũng là một kênh giúp bạn viral thương hiệu của mình trên Online một cách tốt nhất!<br />\nNgày nay, khi người dùng đã ngày càng lười đọc và ít thực hiện các thao tác click liên tục. Họ chỉ cần 1 lần click hoặc 2 lần là phải show được thông tin họ cần. Nếu không họ sẽ out ngay lập tức. Hiểu được nhu cầu của người dùng nên việc SEO Map Google lên TOP cao là nhiệm vụ bắt buộc dành cho các nhà tối ưu SEO giúp cho doanh nghiệp tiếp cận được nhiều khách hàng hơn.</p>', '2021-08-13 08:17:43', '2021-08-13 08:17:43'),
(7, 'Gợi ý 6 chủ đề trang trí bàn tiệc sinh nhật cho bé đẹp và lạ', 'IbZH_193641973_2981927015465893_4612672686779772848_n.jpg', '<p><strong>Kỳ lân – người bạn tưởng tượng đáng yêu nhất của các bé gái. Một chút bông làm mây và những chiếc bánh trang trí màu pastel sẽ tô điểm cho buổi tiệc sinh nhật một không khí lãng mạn, đầy màu sắc cổ tích.</strong></p>', '<p>Làm cha mẹ cũng là một thú vui. Khi con còn nhỏ và yêu thích những đồ vật màu sắc ngộ nghĩnh, các bậc cha mẹ như quay trở về thế giới tuổi thơ đầy ngọt ngào của mình. Để tạo thêm không khí cổ tích cho buổi tiệc sinh nhật của bé, xin dành tặng cho ba mẹ 6 gợi ý cực hay để trang trí bàn tiệc sinh nhật cho bé.</p>\n\n<p>Khi còn nhỏ, các bé luôn mê tít các bạn mèo, bạn gấu, bạn sư tử trong khu rừng hoang dã. Các loài động vật với đủ màu sắc và cá tính sẽ tạo nên không khí cực kỳ tự nhiên và thân thiện cho bé và bè bạn. Những chiếc bánh cupcake hình ngựa vằn hay mặt nạ gấu con sẽ khiến cho bữa tiệc sinh nhật trở nên không đụng hàng đâu các ba mẹ nhé.</p>\n\n<p>2. Chủ đề trang trí “Bé và hội họa”</p>\n\n<p><br />\nĐối với các cô cậu bé mê vẽ vời, đây là một chủ đề&nbsp;trang trí tiệc sinh nhật&nbsp;lý tưởng. Những khay màu với kẹo đậu xinh xắn và chiếc bánh ga tô 7 sắc cầu vồng không hề khó kiếm. Nếu yêu thích chủ đề này các ba mẹ có thể kiếm được rất nhiều phụ kiện độc đáo dành cho bé với chi phí phải chăng.</p>\n\n<p>3. Chủ đề “hoa quả nhiệt đới”</p>\n\n<p><br />\nMàu sắc vừa ngọt ngào vừa tự nhiên sẽ để lại ấn tượng khó quên trong lòng người tham dự. Còn gì tuyệt vời hơn khi trong ngày sinh nhật bé được tận hưởng các hoa quả thơm lừng với tạo hình “nhìn là chảy nước miếng” như thế này.</p>\n\n<p>4. Chủ đề “Kỳ lân một sừng”</p>\n\n<p><br />\nKỳ lân – người bạn tưởng tượng đáng yêu nhất của các bé gái. Một chút bông làm mây và những chiếc bánh trang trí màu pastel sẽ tô điểm cho buổi tiệc sinh nhật một không khí lãng mạn, đầy màu sắc cổ tích.</p>\n\n<p>6. Chủ đề tiệc “khủng long tinh nghịch”</p>\n\n<p><br />\nMột bàn tiệc màu sắc đơn giản nhưng nổi bật lên là những quả bóng bay xanh lốm đốm như trứng khủng long. Các ba mẹ có con là fan của khủng long hãy học tập phong cách này để biến ước mơ của bé thành hiện thực nhé.</p>', '2021-08-13 08:21:13', '2021-08-13 08:21:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `quyen` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `password`, `quyen`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Lê Duy Nghị', '$2y$10$B23UZsyEXl3GtU5ZH4lI1OYa3SjFAxvgq481AqV9UXX2RiM3AUs86', 1, '2021-08-09 11:00:42', '2021-08-09 11:00:42'),
(3, 'vumai', 'Vũ Mai Hoàng', '$2y$10$u2T.PE91r9uZdLlFHVPuJOR6iGJgIp9s6jAaV4ybWBm6mdheC0w3W', 0, '2021-08-09 05:09:46', '2021-08-09 08:04:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDanhmuc` (`idDanhmuc`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `store`
--
ALTER TABLE `store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idDanhmuc`) REFERENCES `danhmuc` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
