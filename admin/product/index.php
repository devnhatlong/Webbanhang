<?php
    $title = 'Quản Lý Sản Phẩm';
    $baseUrl = '../';
    require_once('../layouts/header.php');

    $sql = "SELECT product.*, category.name AS category_name FROM product LEFT JOIN category ON product.category_id = category.id WHERE product.deleted = 0";
    $data = executeResult($sql);
?>

<div class="row">
	<div class="col-md-12 table-responsive" style="margin-top: 20px;">
		<h1>Quản Lý Sản Phẩm</h1>

        <a href="editor.php">
            <button class="btn btn-success">Thêm sản phẩm</button>
        </a>

        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Thumbnail</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Danh Mục</th>
                    <th style="width: 50px"></th>
                    <th style="width: 50px"></th>
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
                                    <td>'.number_format($item['discount']).' VNĐ</td>
                                    <td>'.$item['category_name'].'</td>
                                    <th style="width: 50px">
                                        <a href="editor.php?id='.$item['id'].'">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>
                                    </th>

                                    <th style="width: 50px">
                                        <button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xóa</button>
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
    function deleteProduct(id) {
        option = confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')
        if(!option) {
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