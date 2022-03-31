<?php 
    require_once('./layouts/header.php');
    if(!empty($_POST)) {
        $first_name = getPost('first_name');
        $last_name = getPost('last_name');
        $email = getPost('email');
        $phone_number = getPost('phone_number');
        $subject_name = getPost('subject_name');
        $note = getPost('note');
        $created_at = $updated_at = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO feedback(firstname, lastname, email, phone_number, subject_name, note, status, created_at, updated_at) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$subject_name', '$note', 0, '$created_at', '$updated_at')";
        execute($sql);
    }
  
?>

<!-- BEGIN: SẢN PHẨM MỚI NHẤT -->
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <form method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usr">Tên:</label>
                            <input required="true" type="text" class="form-control" id="usr" name="first_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usr">Họ:</label>
                            <input required="true" type="text" class="form-control" id="usr" name="last_name">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required="true" type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input required="true" type="tel" class="form-control" id="phone" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="address">Chủ đề:</label>
                    <input required="true" type="text" class="form-control" id="subject_name" name="subject_name">
                </div>
                <div class="form-group">
                    <label for="address">Nội dung ghi chú:</label>
                    <textarea class="form-control" name="note" id="" rows="3"></textarea>
                </div>
                <a href="checkout.php">
                    <button class="btn btn-success" style="width: 100%">GỬI PHẢN HỒI</button>
                </a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7838.506920265937!2d106.71011310904403!3d10.791889371627233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527c2f8f30911%3A0x36ac5073f8c91acd!2sLandmark%2081!5e0!3m2!1svi!2s!4v1647870728284!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </form>
</div>
 
<?php 
    require_once('./layouts/footer.php');
?>