<?php
    $title = 'Quản Lý Đơn Hàng';
    $baseUrl = '../';
    require_once('../layouts/header.php');

    // pending, approve, cancel
    $sql = "SELECT * FROM orders ORDER BY status ASC, order_date DESC";
    $data = executeResult($sql);
?>

<div class="row">
	<div class="col-md-12 table-responsive" style="margin-top: 20px;">
		<h1>Quản Lý Đơn Hàng</h1>

        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Họ & Tên</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Nội Dung</th>
                    <th>Tổng Tiền</th>
                    <th>Ngày Tạo</th>
                    <th style="width: 50px"></th>
                </tr>

                <tbody>
                    <?php 
                        $index = 0;
                        foreach($data as $item) {
                            echo '<tr>
                                    <th class="text-center">'.(++$index).'</th>
                                    <td>'.$item['fullname'].'</td>
                                    <td>'.$item['phone_number'].'</td>
                                    <td>'.$item['email'].'</td>
                                    <td>'.$item['address'].'</td>
                                    <td>'.$item['note'].'</td>
                                    <td>'.$item['total_money'].' VNĐ</td>
                                    <td>'.$item['order_date'].'</td>

                                    <th style="width: 110px">';
                                        echo '<a href="detail.php?id='.$item['id'].'">
                                                    <button class="btn btn-sm btn-primary" style="width: 70px; margin-bottom: 10px;">Detail</button>
                                              </a>';
                                        
                                        if($item['status'] == 0) {
                                            echo '<button onclick="changeStatus('.$item['id'].', 1)" class="btn btn-sm btn-success" style="margin-bottom: 10px;">Approve</button>
                                                  <button onclick="changeStatus('.$item['id'].', 2)" class="btn btn-sm btn-danger" style="width: 70px;">Cancel</button>';
                                        } else if($item['status'] == 1) {
                                                    echo '<label class="badge badge-success">Approved</label>';
                                        } else {
                                            echo '<label class="badge badge-danger">Cancel</label>';
                                        }
                                    echo '
                                    </th>
                                </tr>';
                        }
                    ?>
                </tbody>

            </thead>
        </table>
	</div>
</div>
<script type="text/javascript">
    function changeStatus(id, status) {
        $.post('form_api.php', {
            'id': id,
            'status': status,
            'action': 'update_status'
        }, function(data) {
            location.reload()
        })
    }
</script>


<?php 
    require_once('../layouts/footer.php');
?>