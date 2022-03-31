
<footer>
          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                      <h4 class="text-danger">GIỚI THIỆU</h4>
                      <ul>
                          <li><a class="text-white" href="#">LIÊN HỆ CÔNG TY CỔ PHẦN BJ-EVER</a></li>
                          <li class="text-white">Email: <a class="text-white" href="#">dev.nhatlong@gmail.com</a></li>
                          <li class="text-white">Fanpage: <a class="text-white" href="https://www.facebook.com/TrollP96">facebook.com/trollp96</a></li>
                          <li class="text-white">Phone: <a class="text-white" href="#">0123456789</a></li>
                          <li class="text-white">Địa chỉ: <a class="text-white" href="#">Tầng 4-5-6, Tòa nhà Land Mark, số 29 đường MID, Phường Phước Long A, Quận 9, Thành phố Thủ Đức, Việt Nam.</a></li>
                      </ul>
                  </div>
                  <div class="col-md-4">
                      <h4 class="text-danger">DỊCH VỤ KHÁCH HÀNG</h4>
                      <ul>
                          <li><a class="text-white" href="#">Hỏi đáp - FAQs</a></li>
                          <li><a class="text-white" href="#">Chính sách đổi trả 60 ngày</a></li>
                          <li><a class="text-white" href="#">Liên hệ</a></li>
                          <li><a class="text-white" href="#">Dịch vụ gói quà tặng</a></li>
                          <li><a class="text-white" href="#">Khách hàng hài lòng 100%</a></li>
                          <li><a class="text-white" href="#">Chính sách khuyến mãi</a></li>
                          <li><a class="text-white" href="#">Chính sách giao hàng</a></li>
                          <li><a class="text-white" href="#">Chính sách bảo mật thanh toán</a></li>
                      </ul>
                  </div>
                  <div class="col-md-4">
                      <h4 class="text-danger">TÀI LIỆU - TUYỂN DỤNG</h4>
                      <ul>
                          <li><a class="text-white" href="#">Đăng ký bản quyền</a></li>
                          <li><a class="text-white" href="#">Tuyển dụng</a></li>
                          <li><a class="text-white" href="#">Care & Share</a></li>
                          <li><a class="text-white" href="#">Nhà máy</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          
          <div class= "ft2">
                  © 2022 - Được thiết kế bởi Nguyễn Nhật Long.
          </div>
      </footer>
      <?php 
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $count = 0;
        foreach($_SESSION['cart'] as $item) {
            $count += $item['num'];
        }
      ?>
<script>
    function addCart(productId, num) {
        $.post('api/ajax_request.php', {
            'action': 'cart',
            'id': productId,
            'num': num
        }, function(data) {
            location.reload()
        }) 
    }
</script>
      <!-- BEGIN: CART -->
        <span class="cart_icon">
            <span class="cart_count"><?=$count?></span>
            <a href="cart.php">
                <img src="./assets/icons/cart.png" alt="">
            </a>
            
        </span>
      <!-- END: CART -->
  </body>
</html>