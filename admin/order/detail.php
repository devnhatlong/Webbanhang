<?php
    $title = 'Thông Tin Chi Tiết Đơn Hàng';
    $baseUrl = '../';
    require_once('../layouts/header.php');

    $orderID = getGet('id');

    $sql = "SELECT order_details.*,  product.title, product.thumbnail FROM order_details LEFT JOIN product ON product.id = order_details.product_id WHERE order_details.order_id = $orderID";
    $data = executeResult($sql);

    $sql = "SELECT * FROM orders WHERE id = $orderID";
    $orderItem = executeResult($sql, true);
?>

<div class="row">
    <div class="col-md-12">
        <h1>Thông Tin Chi Tiết Đơn Hàng</h1>
    </div>
	<div class="col-md-8 table-responsive" style="margin-top: 20px;">
        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Thumbnail</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng Giá</th>
                </tr>

                <tbody>
                    <?php 
                        $index = 0;
                        foreach($data as $item) {
                            echo '<tr>
                                    <th class="text-center">'.(++$index).'</th>
                                    <td>
                                        <img src="'.fixUrl($item['thumbnail']).'" style="height: 100px"/>
                                    </td>
                                    <td>'.$item['title'].'</td>
                                    <td>'.$item['price'].' VNĐ</td>
                                    <td>'.$item['num'].'</td>
                                    <td>'.$item['total_money'].' VNĐ</td>
                                </tr>';
                        }
                    ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Tổng Tiền:</th>
                                    <th><?=$orderItem['total_money']?> VNĐ</th>
                                </tr>
                </tbody>

            </thead>
        </table>
	</div>
    <div class="col-md-4" style="margin-top: 40px;">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Họ & Tên:</th>
                <td><?=$orderItem['fullname']?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?=$orderItem['email']?></td>
            </tr>
            <tr>
                <th>Địa Chỉ:</th>
                <td><?=$orderItem['address']?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?=$orderItem['phone_number']?></td>
            </tr>
        </table>
    </div>
</div>

<?php 
    require_once('../layouts/footer.php');
?>