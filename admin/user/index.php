<?php
    $title = 'Quản Lý Người Dùng';
    $baseUrl = '../';
    require_once('../layouts/header.php');

    $sql = "SELECT user.*, role.name AS role_name FROM user LEFT JOIN role ON user.role_id = role.id WHERE user.deleted=0";
    $data = executeResult($sql);
?>

<div class="row">
	<div class="col-md-12 table-responsive" style="margin-top: 20px;">
		<h1>Quản Lý Người Dùng</h1>

        <a href="editor.php">
            <button class="btn btn-success">Thêm tài khoản</button>
        </a>

        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Họ & Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Quyền</th>
                    <th style="width: 50px"></th>
                    <th style="width: 50px"></th>
                </tr>

                <tbody>
                    <?php 
                        $index = 0;
                        foreach($data as $item) {
                            echo '<tr>
                                    <th class="text-center">'.(++$index).'</th>
                                    <td>'.$item['fullname'].'</td>
                                    <td>'.$item['email'].'</td>
                                    <td>'.$item['phone_number'].'</td>
                                    <td>'.$item['address'].'</td>
                                    <td>'.$item['role_name'].'</td>
                                    <th style="width: 50px">
                                        <a href="editor.php?id='.$item['id'].'">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>
                                    </th>

                                    <th style="width: 50px">';
                                        if($user['id'] != $item['id'] && $item['role_id'] != 1) {
                                            echo '<button onclick="deleteUser('.$item['id'].')" class="btn btn-danger">Xóa</button>';
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
    function deleteUser(id) {
        option = confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')
        if(!option){
            return;
        }
        $.post('form_api.php', {
            'id': id,
            'action': 'delete'
        }, function(data) {
            location.reload()
        })
    }
</script>

<?php 
    require_once('../layouts/footer.php');
?>