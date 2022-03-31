<?php
    $title = 'Quản Lý Phản Hồi';
    $baseUrl = '../';
    require_once('../layouts/header.php');

    $sql = "SELECT * FROM feedback ORDER BY status ASC, updated_at DESC";
    $data = executeResult($sql);
?>

<div class="row">
	<div class="col-md-12 table-responsive" style="margin-top: 20px;">
		<h1>Quản Lý Phản Hồi</h1>

        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Tên</th>
                    <th>Họ</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Chủ Đề</th>
                    <th>Nội Dung</th>
                    <th>Ngày Tạo</th>
                    <th style="width: 50px"></th>
                </tr>

                <tbody>
                    <?php 
                        $index = 0;
                        foreach($data as $item) {
                            echo '<tr>
                                    <th class="text-center">'.(++$index).'</th>
                                    <td>'.$item['firstname'].'</td>
                                    <td>'.$item['lastname'].'</td>
                                    <td>'.$item['phone_number'].'</td>
                                    <td>'.$item['email'].'</td>
                                    <td>'.$item['subject_name'].'</td>
                                    <td>'.$item['note'].'</td>
                                    <td>'.$item['updated_at'].'</td>

                                    <th style="width: 110px">';
                                        if($item['status'] == 0) {
                                            echo '<button onclick="markRead('.$item['id'].')" class="btn btn-danger">Đã đọc</button>';
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
    function markRead(id) {
        $.post('form_api.php', {
            'id': id,
            'action': 'mark'
        }, function(data) {
            location.reload()
        })
    }
</script>


<?php 
    require_once('../layouts/footer.php');
?>