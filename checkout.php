<?php 
  require_once('./layouts/header.php');
  
  
?>

<!-- BEGIN: SẢN PHẨM MỚI NHẤT -->
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <form method="POST" onsubmit="return completeCheckout()">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="usr">Họ & tên:</label>
                    <input required="true" type="text" class="form-control" id="usr" name="fullname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required="true" type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input required="true" type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input required="true" type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="address">Nội dung ghi chú:</label>
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Thumbnail</th>
                        <th>Tiêu Đề</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá</th>
                    </tr>
                    <?php
                        if(!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        }
                        $index = 0;
                        $total = 0;
                        foreach($_SESSION['cart'] as $item) {
                            $total += $item['discount'] * $item['num'];
                            echo '<tr>
                                    <td>'.(++$index).'</td>
                                    <td><img src="'.$item['thumbnail'].'" style="height: 80px"/></td>
                                    <td>'.$item['title'].'</td>
                                    <td>'.number_format($item['discount']).' VNĐ</td>
                                    <td>'.$item['num'].'</td>
                                    <td>'.number_format($item['discount'] * $item['num']).' VNĐ</td>
                                </tr>';
                        }
                    ?>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Tổng Tiền:</th>
                        <th><?=number_format($total)?> VNĐ</th>
                    </tr>
                </table>
                <a href="checkout.php">
                    <button class="btn btn-success" style="width: 100%">THANH TOÁN</button>
                </a>
            </div>
        </div>
    </form>
</div>
<!-- END: SẢN PHẨM MỚI NHẤT -->
<script>
    function completeCheckout() {
        $.post('api/ajax_request.php', {
            'action': 'checkout',
            'fullname': $('[name=fullname]').val(),
            'email': $('[name=email]').val(),
            'phone_number': $('[name=phone]').val(),
            'address': $('[name=address]').val(),
            'note': $('[name=note]').val()
        }, function() {
            window.open('complete.php', '_self');
        }) 

        return false;
    }
</script>   
<?php 
    require_once('./layouts/footer.php');
?>