-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 05:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milktea`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userId`, `productId`, `amount`) VALUES
(3, 9, 2),
(1, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `rate` int(11) NOT NULL,
  `content` text NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `userId`, `date`, `rate`, `content`, `show`, `email`) VALUES
(1, 3, '2023-04-26 13:53:09', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet ornare mi sit amet viverra. Quisque elementum, ipsum convallis fermentum egestas, diam orci consectetur justo, ut semper nisi turpis a metus. Quisque euismod a erat et accumsan. Aenean blandit dolor ut massa suscipit sollicitudin hendrerit in massa. Cras dignissim, diam sollicitudin sollicitudin dictum, velit massa sollicitudin tellus, nec mattis quam velit vitae nibh. Sed fringilla luctus eros, nec tincidunt nisl convallis sed. Morbi ut finibus velit. Nulla facilisis ac odio et tempor. Cras nibh orci, commodo ac felis nec, hendrerit vulputate enim. Aliquam pharetra dictum velit, lobortis venenatis metus. In interdum sem ut libero facilisis, ut placerat arcu bibendum. Duis quis mi in nunc viverra varius nec vitae mi. Fusce quis libero volutpat, gravida nisl at, dapibus neque. Integer ac ante id nunc ultricies commodo eget vel lorem. Phasellus fermentum pulvinar odio, eu tristique metus venenatis tincidunt.', 1, 'a123@gmail.com'),
(2, 4, '2023-04-26 13:55:04', 2, 'Ngon nhưng hơi dở.', 1, 'aaa@gmail.com'),
(3, 5, '2023-04-26 13:56:13', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet ornare mi sit amet viverra. Quisque elementum, ipsum convallis fermentum egestas, diam orci consectetur justo, ut semper nisi turpis a metus. Quisque euismod a erat et accumsan. Aenean blandit dolor ut massa suscipit sollicitudin hendrerit in massa. Cras dignissim, diam sollicitudin sollicitudin dictum, velit massa sollicitudin tellus, nec mattis quam velit vitae nibh. Sed fringilla luctus eros, nec tincidunt nisl convallis sed. Morbi ut finibus velit. Nulla facilisis ac odio et tempor. Cras nibh orci, commodo ac felis nec, hendrerit vulputate enim. Aliquam pharetra dictum velit, lobortis venenatis metus. In interdum sem ut libero facilisis, ut placerat arcu bibendum. Duis quis mi in nunc viverra varius nec vitae mi. Fusce quis libero volutpat, gravida nisl at, dapibus neque. Integer ac ante id nunc ultricies commodo eget vel lorem. Phasellus fermentum pulvinar odio, eu tristique metus venenatis tincidunt.', 1, 'aaa123@gmail.com'),
(4, 1, '2023-04-26 13:53:09', 2, 'asdfeg123', 1, 'asdfeg12300@gmail.com'),
(5, 1, '2023-04-26 13:53:09', 3, 'asdfeg', 1, 'asd@gmail.com'),
(7, 1, '0000-00-00 00:00:00', 3, 'asdfeg123', 1, 'a@gmail.com'),
(8, 1, '0000-00-00 00:00:00', 2, 'asdfeg123', 1, 'a@gmail.com'),
(11, 1, '0000-00-00 00:00:00', 5, 'asdfeg123', 1, 'a@gmail.com'),
(12, 1, '0000-00-00 00:00:00', 4, 'asdfeg123', 0, 'a123@gmail.com'),
(13, 1, '0000-00-00 00:00:00', 4, 'asdfeg123', 0, 'a123@gmail.com'),
(21, 1, '0000-00-00 00:00:00', 4, 'dở', 1, 'thongle@hcmut.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `detailorder`
--

CREATE TABLE `detailorder` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `mpp` int(11) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `sum`) VALUES
(1, 1, 900000),
(3, 1, 190000),
(4, 1, 330000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `gia` int(11) NOT NULL DEFAULT 0,
  `type` text NOT NULL,
  `popular` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `img`, `description`, `ten`, `gia`, `type`, `popular`) VALUES
(1, 'https://dayphache.edu.vn/wp-content/uploads/2019/08/luong-duong-trong-1-ly-tra-sua.jpg', 'Trà sữa đậm vị.', 'Sữa tươi trân châu đường đen.', 40000, 'ts', 1),
(2, 'https://giadinh.mediacdn.vn/296230595582509056/2023/2/14/tra-sua4-16763690555281371594555.jpg', 'Trà sữa Đài Loan vị ngon không kém chính chủ.', 'Trà sữa Đài Loan', 55000, 'ts', 1),
(3, 'https://dayphache.edu.vn/wp-content/uploads/2020/02/mon-tra-sua-tran-chau.jpg', 'Trà sữa truyền thống đậm vị.', 'Trà sữa truyền thống.', 45000, 'ts', 0),
(4, 'https://dayphache.edu.vn/wp-content/uploads/2022/02/tra-sua-dau-thom-mat.jpg', 'Trà sữa dâu với nguyên liệu từ dâu tươi 100%', 'Trà sữa dâu', 50000, 'ts', 0),
(5, 'https://file.hstatic.net/1000394081/article/hong-tra-sua-tran-chau_b9f8c16a46f942f88a56ca3e971caaf1.jpg', 'Hồng trà sữa rất ngon rất đậm vị.', 'Hồng trà sữa', 60000, 'ts', 0),
(6, 'https://beptruong.edu.vn/wp-content/uploads/2019/01/ca-phe-da-xay.jpg', 'Cà phê đá xay chất lượng', 'Cà phê đá xay', 50000, 'cp', 1),
(7, 'https://product.hstatic.net/1000241700/product/sp3._grande.png', 'Expresso đậm vị ngon lành', 'Expresso ', 45000, 'cp', 0),
(9, 'https://g20coffee.vn/ca-phe-phin-la-gi-ban-da-thuc-su-hieu-ro-chua.jpg', 'Cà phê phin nguyên chất', 'Cà phê phin', 30000, 'cp', 0),
(10, 'https://smoothiedays.com/wp-content/uploads/2020/08/sinh-to-dua-gang-sua-chua.png', 'Sinh tố dưa gang mát lạnh cho mùa hè nóng nực', 'Sinh tố dưa gang', 30000, 'st', 1),
(11, 'https://cdn.tgdd.vn/Files/2019/03/29/1157565/tu-lam-sinh-to-dau-tai-nha-don-gian-thom-ngon-beo-min-202201251157369827.jpg', 'Sinh tô dâu không chua siêu ngọt', 'Sinh tố dâu', 30000, 'st', 0),
(12, 'https://unie.com.vn/wp-content/uploads/2019/12/L%E1%BB%A3i-%C3%ADch-c%E1%BB%A7a-vi%E1%BB%87c-u%E1%BB%91ng-sinh-t%E1%BB%91-nho.jpg', 'Sinh tố nho rất tốt cho sức khỏe', 'Sinh tố nho', 35000, 'st', 0),
(13, 'https://cdn.mediamart.vn/images/news/9-cach-lam-sinh-t-dua-hu-ngon-b-dung-gii-khat-cc-da_657ccc02.jpg', 'Sinh tố dưa hấu mát lạnh tươi ngon', 'Sinh tố dưa hấu', 30000, 'st', 0),
(14, 'https://cdn.tgdd.vn/Files/2019/04/22/1162314/dang-xinh-da-dep-voi-sinh-to-bo-chuoi-thom-ngon-202201101952370748.jpeg', 'Sinh tố bơ béo ngậy đặc biệt ngon', 'Sinh tố bơ', 30000, 'st', 1),
(15, 'https://img.meta.com.vn/Data/image/2020/02/17/nuoc-cam-quyt-buoi-2.jpg', 'Bổ sung vitamin C với 1 ly cam tươi nào', 'Nước ép cam', 20000, 'ne', 1),
(16, 'https://cdn.tgdd.vn/Files/2019/07/14/1179531/nuoc-ep-tao-co-tac-dung-gi-ma-ai-cung-thi-nhau-uong-201907142251530613.jpg', 'Tăng cường sức khỏe với nước ép táo nào', 'Nước ép táo', 40000, 'ne', 0),
(17, 'https://toplist.vn/images/800px/nuoc-ep-dua-luoi-mat-ong-691259.jpg', 'Nước ép dưa lưới tươi ngon', 'Nước ép dưa lưới', 30000, 'ne', 1),
(18, 'https://smoothiedays.com/wp-content/uploads/2020/09/cach-lam-nuoc-ep-nho.png', 'Nước ép nho tươi ngon lành đậm vị nho', 'Nước ép nho', 30000, 'ne', 0),
(19, 'https://cdn.tgdd.vn/2021/08/CookRecipe/GalleryStep/thanh-pham-968.jpg', 'Lẩu ly siêu ngon tuy nhỏ nhưng đủ dưỡng chất', 'Lẩu ly', 40000, 'k', 0),
(20, 'https://daotaobeptruong.vn/wp-content/uploads/2020/11/banh-tiramisu.jpg', 'Tiramisu chocolate bạn phải thử một lần.', 'Tiramisu', 30000, 'k', 1),
(21, 'https://cdn.tgdd.vn/2020/12/CookProduct/1260-1200x643-36.jpg', 'Bông lan trứng muối thích hợp cho bữa ăn nhẹ khi đói', 'Bánh bông lan trứng muối', 30000, 'k', 0),
(22, 'https://www.huongnghiepaau.com/wp-content/uploads/2019/01/lam-banh-tiramisu-tra-xanh.jpg', 'Nếu bạn thích matcha có thể thử tiramisu trà xanh', 'Tiramisu trà xanh', 30000, 'k', 0),
(23, 'https://www.cet.edu.vn/wp-content/uploads/2020/11/banh-gion-rum.jpg', 'Bạn nên thử tart trứng thơm ngon một lần', 'Bánh tart trứng', 20000, 'k', 0),
(24, 'https://cdn.tgdd.vn/Files/2020/05/11/1254925/cach-lam-banh-quy-socola-nhanh-chong-don-gian-bang-7.jpg', 'Nếu bạn thích những thứ đơn giản có thể thử những chiếc bánh quy này', 'Bánh quy chocolate', 20000, 'k', 0),
(25, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Caneles_stemilion.jpg/1200px-Caneles_stemilion.jpg', 'Vậy nếu một phần Caneles mới lạ đặc biệt như này thì sao nhỉ?', 'Caneles', 20000, 'k', 0),
(26, 'https://livforcake.com/wp-content/uploads/2019/02/red-velvet-cake-update-9.jpg', 'Bạn hãy thử một phần Red velvet xem', 'Bánh red velvet', 30000, 'k', 0),
(27, 'https://chefjob.vn/wp-content/uploads/2020/07/trang-mien-panna-cotta-don-gian-de-lam.jpg', 'Panna cotta dâu tây thơm ngon mát lạnh', 'Panna cotta', 20000, 'k', 1),
(36, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoGBxQUExYUFBQXFxYYGRwdGBkYGh0fIB0YIRwZHBwcGRkZICoiICAnHRggIzQjJysuMTExGSE2OzYvOiowMS4BCwsLDw4PHRERHTAoISgwMDUwMDAyMjIwMDIwMDAwMDAwMDAwMzAyMDAwM', 'Bánh mì đặc ruột', 'Banh mì', -20000, 'k', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `tentk` varchar(20) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `diem` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `tentk`, `matkhau`, `diem`) VALUES
(1, 'a111111', 'a112222', 'a', '123456', 1000),
(3, 'aaa', 'aaa', 'aaaa', 'aaaaaa', 0),
(4, 'aaa', 'aaa', 'aaa', '123456', 0),
(5, 'aaa', 'aaa', 'ababab', '123456', 10000),
(6, 'aaaaaa', 'aaaaaa', 'a123', '123456', 0),
(7, 'aaaaaa', 'aaaaaa', 'a1234', '123456', 0),
(9, 'aaaaaa', 'aaaaaaaa', 'a1a1a1', '123456', 0),
(10, 'aaaaaa', 'aaaaaaaa', 'a2a2a2', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_cart_product_id` (`productId`),
  ADD KEY `fk_user_cart_id` (`userId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commentId` (`userId`);

--
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD KEY `fk_orderId` (`orderId`),
  ADD KEY `fk_productId` (`productId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userId` (`idUser`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product_id` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_cart_id` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_commentId` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `fk_orderId` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_productId` FOREIGN KEY (`productId`) REFERENCES `product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
