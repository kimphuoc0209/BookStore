-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 10:59 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_users`
--

INSERT INTO `auth_users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `status`, `img`, `last_login`, `date_created`) VALUES
(1, 'tan', 'vy', 'tanvywa@gmail.com', 'tanvypro', '$2y$10$SLZ02Lq7fTEg1LXhvL44T.X12IJS1a81NGrU9xBTwfJnb4H62YTe.', 'admin', '', '2021-11-18 15:15:39', '2021-11-10 16:11:05'),
(15, 'Le', 'Trung', 'lethanhtrung7412@gmail.com', 'admin', '$2y$10$SLZ02Lq7fTEg1LXhvL44T.X12IJS1a81NGrU9xBTwfJnb4H62YTe.', 'admin', '../uploads/logo1.jpg', '2021-11-17 17:04:45', '2021-11-09 17:42:40'),
(16, 'Le', 'Trung', '1951120157@sv.ut.edu.vn', 'lethanhtrung7412', '$2y$10$8c7WoVPPSry2mVk2oFsxguq/sFQMsYntW2JOVf6rFT7cr2BAgs17C', 'staff', '', '2021-11-17 13:27:45', '2021-11-11 09:15:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `password`, `reg_date`) VALUES
(1, 'Lê', 'Trung', 'lethanhtrung7412@gmail.com', '+10945968870', 'LMAO', '12345', '2021-11-10 17:37:54'),
(2, 'Tra', 'My', 'my@gmail.com', '56456445', 'ha tinh', '12345', '2021-11-17 21:40:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `fname`, `email`, `phone`, `message`) VALUES
(1, 'Lê Thành Trung', 'lethanhtrung7412@gmail.com', '+10945968870', 'Xin chào bà con'),
(2, 'thanh trung', 'WAPA20211313', '0367439323', 'fs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `phone_number`, `shipping_address`, `order_date`, `status`) VALUES
(1, 1, '', '', '2021-11-12 14:26:55', 'accepted'),
(2, 1, '+84945968870', '47/Tổ 1/Thôn Lạc Lâm Làng', '2021-11-17 16:55:59', 'accepted'),
(7, 2, '554', 'hcm1', '2021-11-18 14:17:25', 'accepted'),
(8, 2, '0367439323', 'thdfh', '2021-11-18 14:48:38', 'accepted'),
(9, 2, '0367439323', 'trung', '2021-11-18 15:05:00', 'Pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `book_id`, `qty`, `price`) VALUES
(1, 1, 2, 1, 300000),
(2, 2, 5, 1, 200000),
(3, 2, 6, 1, 250000),
(4, 3, 11, 1, 200000),
(5, 4, 11, 1, 200000),
(6, 5, 4, 1, 200000),
(7, 6, 11, 1, 200000),
(8, 6, 10, 1, 200000),
(9, 7, 11, 1, 200000),
(10, 8, 10, 1, 200000),
(11, 9, 10, 1, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `pdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `pdesc`, `img`, `created_at`, `created_by`) VALUES
(1, 'Python Data Analytics', 200000, 'Hello', 'uploads/618c8009d5c58.jpg', '2021-11-11 09:29:29', 'Mpemba'),
(2, 'JavaScript&Jquery', 300000, 'Một cuốn sách bạn nên đọc khi bắt đầu với Javascript', 'uploads/618dfdfa105e2.jpg', '2021-11-12 12:39:06', 'Mpemba'),
(3, 'Đừng Làm Việc Chăm Chỉ Hãy Làm Việc Thông Minh', 200000, 'Thành công là học cách làm việc THÔNG MINH hơn chứ không phải CHĂM CHỈ hơn! Những người thành công thường chỉ tập trung thời gian của họ vào một vài ưu tiên và luôn nghĩ làm thế nào để mọi việc diễn ra suôn sẻ.', 'uploads/6194cace84f90.jpg', '2021-11-17 16:26:38', 'Mpemba'),
(4, 'How Psychology Works - Hiểu Hết Về Tâm Lý Học', 200000, 'MỘT TRONG NHỮNG CUỐN SÁCH MỞ KHÓA HỮU ÍCH NHẤT VỀ TƯ DUY, KÝ ỨC VÀ CẢM XÚC CỦA CON NGƯỜI!', 'uploads/6194cb16867c9.jpg', '2021-11-17 16:27:50', 'Mpemba'),
(5, 'Những Người Khốn Khổ (Boxet 2 Tập)', 200000, 'Những người khốn khổ là một tác phẩm chứa chan tinh thần lãng mạn cách mạng.', 'uploads/6194cb6be52a3.jpg', '2021-11-17 16:29:16', 'Mpemba'),
(6, 'Hai Số Phận', 250000, 'Hai đứa Kane và Abel sinh ra cùng một ngày, một giờ, ở hai xứ sở hoàn toàn xa lạ. Người giàu sang, kẻ khốn khó nhưng họ giống nhau đến kỳ lạ, đều có tham vọng và nghị lực phi thường. Dù ở khu ổ chuột hay căn phòng hoa lệ, dù học nhờ hay có gia sư riêng, họ luôn chứng tỏ được sự thông minh và óc quan sát nhạy bén của mình.', 'uploads/6194cbc3d7921.jpg', '2021-11-17 16:30:43', 'Mpemba'),
(7, 'Spy X Family Tập 6', 400000, 'Nhận nhiệm vụ lấy trộm văn kiện mật về cuộc chiến, Twilight và Nightfall phải tham chiến trong đại hội ngầm dưới lòng đất!! Nhưng Nightfall, một người âm thầm ngưỡng mộ Loid và luôn cho rằng mình phù hợp với vai trò người vợ hơn ai hết, đã khiến vợ chồng nhà Forger rơi vào tình cảnh nguy hiểm…!?', 'uploads/6194cd55aeea9.jpg', '2021-11-17 16:37:25', 'Mpemba'),
(8, 'Digital Marketing - Từ Chiến Lược Đến Thực Thi ', 150000, 'Cuốn sách đầu tiên tại Việt Nam cung cấp hệ thống kiến thức bài bản nhất, cốt lõi nhất về Digital Marketing, bằng việc đi từ chiến lược tới triển khai, từ bao quát đến chi tiết, giúp quá trình lập và thực thi các chiến dịch Marketing của bạn hiệu quả hơn.\r\n', 'uploads/6194ce4e14e56.jpg', '2021-11-17 16:41:34', 'Mpemba'),
(9, 'The Basic of User Experience Design', 300000, 'Một cuốn sách hay cho những người mới bắt đầu với con đường UX', 'uploads/6194cf08b861c.jpg', '2021-11-17 16:44:40', 'Mpemba'),
(10, 'Ủa? Genz???', 200000, 'Cuốn sách này dành cho thế hệ GenZ\r\n- Vẽ ra chân dung chân thực nhất về cá tính GenZ trong thời đại công nghệ số\r\n- Giải mã ngôn ngữ GenZ, khám phá những hot trend hàng đầu và kết nối những con người tiên phong tạo nên xu hướng', 'uploads/6194d090e9ac0.jpg', '2021-11-17 16:51:13', 'Mpemba'),
(11, 'Sách Truyện Kiều (Tái bản 2021)', 200000, 'TRUYỆN KIỀU\r\n-\r\nKIM VÂN KIỀU TÂN TRUYỆN\r\n-\r\n(Tái bản 2021)', 'uploads/6194d12bb31ee.jpg', '2021-11-17 16:53:47', 'Mpemba'),
(12, 'Bài Học Cuộc Sống', 150000, '– Cuốn sách đã bán được hàng triệu bản trên thế giới\r\n– Cuốn sách đã được dịch và bán bản quyền cho hơn 40 quốc gia', 'uploads/6194d435bad8d.jpg', '2021-11-17 17:06:45', 'Mpemba');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `s_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `order_id`, `book_id`, `qty`, `price`, `s_date`) VALUES
(1, 1, 2, 1, 300000, '2021-11-17 13:09:39'),
(2, 2, 5, 1, 200000, '2021-11-17 16:56:41'),
(3, 2, 6, 1, 250000, '2021-11-17 16:56:41'),
(4, 7, 11, 1, 200000, '2021-11-18 14:45:44'),
(5, 8, 10, 1, 200000, '2021-11-18 14:48:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
