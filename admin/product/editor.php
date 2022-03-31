<?php
    $title = 'Thêm/Sửa Sản Phẩm';
    $baseUrl = '../';
    require_once('../layouts/header.php');

    $id = $thumbnail = $title = $price = $discount = $category_id = $description = '';
    require_once('form_save.php');

    $id = getGet('id');
    if(($id != '') && ($id > 0)) {
        $sql = "SELECT * FROM product WHERE id = '$id' AND deleted = 0";
        $userItem = executeResult($sql, true);
        if($userItem != null) {
            $thumbnail = $userItem['thumbnail'];
            $title = $userItem['title'];
            $price = $userItem['price'];
            $discount = $userItem['discount'];
            $category_id = $userItem['category_id'];
            $description = $userItem['description'];
        } else {
            $id = 0;
        }
    } else {
        $id = 0;
    }
    
    
    $sql = "SELECT * FROM category";
    $categoryItems = executeResult($sql);
?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="row">
	<div class="col-md-12 table-responsive" style="margin-top: 20px;">
		<h1>Thêm/Sửa Sản Phẩm</h1>

        <div class="panel panel-primary bg-image main-reg">
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-4 col-12" style="border-radius: 5px; border: 1px solid green; padding: 10px;">
                            <div class="form-group">
                                <label for="usr">Tên Sản Phẩm:</label>
                                <input required="true" type="text" class="form-control" id="title" name="title" value="<?=$title?>">
                                <!-- Phân biệt form -->
                                <input type="text" name="id" value="<?=$id?>" hidden="true">
                            </div>
                            <div class="form-group">
                                <label for="usr">Danh Mục Sản Phẩm:</label>
                                <select class="form-control" name="category_id" id="category_id" require="true">
                                    <option value="">--Chọn--</option>
                                    <?php 
                                        foreach($categoryItems as $category) {
                                            if($category['id'] == $category_id) {
                                                echo '<option selected value="'.$category['id'].'">'.$category['name'].'</option>';
                                            } else {
                                                echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Thumbnail:</label>
                                <!-- Up ảnh bằng link -->
                                <!-- <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()"> -->
                                <!-- Up ảnh bằng file ảnh-->
                                <input required="true" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" class="form-control" id="thumbnail" name="thumbnail" style="height: 44px;">
                                <img id="thumbnail_img" src="<?=fixUrl($thumbnail)?>" alt="" style="max-height: 160px; margin-top: 15px; margin-left: 150px;">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá:</label>
                                <input required="true" type="number" class="form-control" id="price" name="price" value="<?=$price?>">
                            </div>
                            <div class="form-group">
                                <label for="discount">Giảm Giá:</label>
                                <input required="true" type="number" class="form-control" id="discount" name="discount" value="<?=$discount?>">
                            </div>
                            
                            <button class="btn btn-success gradient-custom-4" style="border: none; padding: 10px;">Lưu Sản Phẩm</button>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="description">Nội Dung:</label>
                                <textarea class="form-control" name="description" id="description" row="5"><?=$description?></textarea>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>

	</div>
</div>

<script type="text/javascript">
    function updateThumbnail() {
        $('#thumbnail_img').attr('src', $('#thumbnail').val());
    }
</script>
<script>
      $('#description').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 400,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>

<!-- show image when upload file javascript
    https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded -->
<script>
    thumbnail.onchange = evt => {
    const [file] = thumbnail.files
    if (file) {
        thumbnail_img.src = URL.createObjectURL(file)
    }
}
</script>

<?php 
    require_once('../layouts/footer.php');
?>