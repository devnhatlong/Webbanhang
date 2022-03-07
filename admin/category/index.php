<?php
    $title = 'Quản Lý Danh Mục Sản Phẩm';
    $baseUrl = '../';
    require_once('../layouts/header.php');

    
    require_once('form_save.php');
    $id = $name = '';
    
    if(isset($_GET['id'])) {
        $id = getGet('id');
        $sql = "SELECT * FROM category WHERE id = $id";
        $data = executeResult($sql, true);

        if($data != null) {
            $name = $data['name'];
        }
    }

    $sql = "SELECT * FROM category";
    $data = executeResult($sql);
?>

<div class="row">

    <div class="col-md-12">
        <h1>Quản Lý Sản Phẩm</h1>
    </div>
    
    <div class="col-md-6" style="margin-top: 12px;">
        <form action="index.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="usr" style="font-weight: bold;">Tên Danh Mục:</label>
                <input style="height: 48px;" required="true" type="text" class="form-control" id="usr" name="name" value="<?=$name?>">
                <!-- Phân biệt form -->
                <input type="text" name="id" value="<?=$id?>" hidden="true">
                <button style="margin-top: 20px;" class="btn btn-success gradient-custom-4" style="border: none; padding: 10px;">Lưu</button>
            </div>
        </form>
    </div>

	<div class="col-md-6 table-responsive" style="margin-top: 20px;">
		

        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Tên Danh Mục</th>
                    <th style="width: 50px"></th>
                    <th style="width: 50px"></th>
                </tr>

                <tbody>
                    <?php 
                        $index = 0;
                        foreach($data as $item) {
                            echo '<tr>
                                    <th class="text-center">'.(++$index).'</th>
                                    <td>'.$item['name'].'</td>
                                    <th style="width: 50px">
                                        <a href="?id='.$item['id'].'">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>
                                    </th>

                                    <th style="width: 50px">
                                        <button onclick="deleteCategory('.$item['id'].')" class="btn btn-danger">Xóa</button>
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
    function deleteCategory(id) {
        option = confirm('Bạn có chắc chắn muốn danh mục này không?')
        if(!option) return;
        
        $.post('form_api.php', {
            'id': id,
            'action': 'delete'
        }, function(data) {
            if(data != null && data != '') {
                alert(data);
                return;
            }
            location.reload()
        })
    }
</script>


<?php 
    require_once('../layouts/footer.php');
?>