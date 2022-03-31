<?php 
    if(!empty($_POST)) {
        $id = getPost('id');
        $title = getPost('title');
        $price = getPost('price');
        $discount = getPost('discount');
        $thumbnail = moveFile('thumbnail');
        $description = getPost('description');
        $category_id = getPost('category_id');
        $created_at = $updated_at = date('Y-m-d H-i-s');
        
        if($id > 0) {
            //update
            if($thumbnail != '') {
                $sql = "UPDATE product SET title = '$title', price = '$price', discount = '$discount', thumbnail = '$thumbnail', description = '$description', category_id = '$category_id', created_at = '$created_at', updated_at = '$updated_at' WHERE id = $id";
            } else {
                $sql = "UPDATE product SET title = '$title', price = '$price', discount = '$discount', description = '$description', category_id = '$category_id', created_at = '$created_at', updated_at = '$updated_at' WHERE id = $id";
            }
            
            execute($sql);

            header('Location: index.php');
            die();
        } else {
            //insert
            $sql = "INSERT INTO product(title, price, discount, thumbnail, description, category_id, created_at, updated_at, deleted) VALUES ('$title', '$price', '$discount', '$thumbnail', '$description', '$category_id','$created_at', '$updated_at', 0)";
            execute($sql);

            header('Location: index.php');
            die();
        }
    
    }
?>