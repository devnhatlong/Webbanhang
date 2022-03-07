-- ========================CREATE TABLE============================

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(100)
);

-- =================================================================

CREATE TABLE `FeedBack` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `subject_name` varchar(200) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
);

-- =================================================================

CREATE TABLE `Galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500)
);

-- =================================================================

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
);

-- =================================================================

CREATE TABLE `Order_Details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
);

-- =================================================================

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
);

-- =================================================================

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(20)
);

--
-- Đang đổ dữ liệu cho bảng `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- =================================================================

CREATE TABLE `Tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(32),
  `created_at` datetime DEFAULT NULL
);

-- =================================================================

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
);

--
-- Đang đổ dữ liệu cho bảng `User`
--

INSERT INTO `User` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Nguyễn Nhật Long', 'leetieulong687@gmail.com', '+84943952618', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 1, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(2, 'Nguyễn Thái Dương', 'sunvip2k@gmail.com', '+84943552213', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(3, 'Nguyễn Văn Chương', 'chuong2k.com@gmail.com', '+84945658243', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(4, 'Nguyễn Phước Thạnh', 'thanhvipno1@gmail.com', '+84943478284', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(5, 'Lê Tiến Anh', 'anhprovip123@gmail.com', '+84948746284', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0);

-- =========================SET KHÓA CHÍNH===========================

--
-- Chỉ mục cho bảng `Category`
--
ALTER TABLE `Category`
ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `FeedBack`
--
ALTER TABLE `FeedBack`
ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Galery`
--
ALTER TABLE `Galery`
ADD PRIMARY KEY (`id`),
ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `Orders`
--
ALTER TABLE `Orders`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
ADD PRIMARY KEY (`id`),
ADD KEY `product_id` (`product_id`),
ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `Product`
--
ALTER TABLE `Product`
ADD PRIMARY KEY (`id`),
ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `Role`
--
ALTER TABLE `Role`
ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Tokens`
--
ALTER TABLE `Tokens`
ADD PRIMARY KEY (`user_id`,`token`);

--
-- Chỉ mục cho bảng `User`
--
ALTER TABLE `User`
ADD PRIMARY KEY (`id`),
ADD KEY `role_id` (`role_id`);


--
-- ===================ADD NOT NULL AND AUTO_INCREMENT===================
--

--
-- AUTO_INCREMENT cho bảng `Category`
--
ALTER TABLE `Category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `FeedBack`
--
ALTER TABLE `FeedBack`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Galery`
--
ALTER TABLE `Galery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Orders`
--
ALTER TABLE `Orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Product`
--
ALTER TABLE `Product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Role`
--
ALTER TABLE `Role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `User`
--
ALTER TABLE `User`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- ====================RÀNG BUỘC KHÓA NGOẠI======================

--
-- Các ràng buộc cho bảng `Galery`
--
ALTER TABLE `Galery` ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

--
-- Các ràng buộc cho bảng `Orders`
--
ALTER TABLE `Orders` ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Các ràng buộc cho bảng `Order_Details`
--
ALTER TABLE `Order_Details` 
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`),

  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`id`);

--
-- Các ràng buộc cho bảng `Product`
--
ALTER TABLE `Product` ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

--
-- Các ràng buộc cho bảng `Tokens`
--
ALTER TABLE `Tokens` ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Các ràng buộc cho bảng `User`
--
ALTER TABLE `User` ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);
