<?php 
  require_once('./layouts/header.php');
  
  $sql = "SELECT product.*, category.name AS category_name FROM product LEFT JOIN category ON product.category_id = category.id ORDER BY product.updated_at DESC LIMIT 0,4";
  $lastestItems = executeResult($sql);
?>

    <!-- BANNER BEGIN -->
    <div class="container">
        <div style="margin-top: 20px;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="./assets/banner/bn1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="./assets/banner/bn2.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="./assets/banner/bn3.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- BANNER END -->

    <!-- BEGIN: SẢN PHẨM MỚI NHẤT -->
    <div class="container">
      <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM MỚI NHẤT</h1>
      <div class="row">
          <?php 
            foreach($lastestItems as $item) {
              echo '<div class="col-md-3 col-6 product-item">
                      <a href="detail.php?id='.$item['id'].'">
                        <img src="'.$item['thumbnail'].'" style="width: 100%;">
                      </a>
                      <p style="font-weight: bold;">'.$item['category_name'].'</p>
                      <a href="detail.php?id='.$item['id'].'">
                        <p style="font-weight: bold;">'.$item['title'].'</p>
                      </a>
                      <p style="color: red; font-weight: bold;">'.number_format($item['discount']).' VNĐ</p>
                      <p>
                          <button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%;">
                              <i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng
                          </button>
                      </p>
                    </div>';
            }
          ?>
      </div>
    </div>
    <!-- END: SẢN PHẨM MỚI NHẤT -->

    <!-- BEGIN: DANH MỤC SẢN PHẨM -->
    <?php 
        $count = 0;
        foreach($menuItems as $item) {
          $sql = "SELECT product.*, category.name AS category_name FROM product LEFT JOIN category ON product.category_id = category.id WHERE product.category_id = ".$item['id']." ORDER BY product.updated_at DESC LIMIT 0,4";
          $items = executeResult($sql);

          if($items == null || count($items) < 4) continue;
        
    ?>
        <div style="background-color: <?=($count++%2 == 0)?'#f7f9fa':''?>;">
          <div class="container">
            <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?=$item['name']?></h1>
                <div class="row">
                    <?php
                      $sql = "SELECT product.*, category.name AS category_name FROM product LEFT JOIN category ON product.category_id = category.id WHERE product.category_id = ".$item['id']." LIMIT 0,4";
                      $p = executeResult($sql);
                      foreach($p as $pItem) {
                        echo '<div class="col-md-3 col-6 product-item product-hover-overlay">
                                <a href="detail.php?id='.$pItem['id'].'">
                                  <img src="'.$pItem['thumbnail'].'" style="width: 100%;">
                                </a>
                                <p style="font-weight: bold;">'.$pItem['category_name'].'</p>
                                <a href="detail.php?id='.$pItem['id'].'">
                                  <p style="font-weight: bold;">'.$pItem['title'].'</p>
                                </a>
                                <p style="color: red; font-weight: bold;">'.number_format($pItem['discount']).' VNĐ</p>
                                <p>
                                    <button class="btn btn-success" onclick="addCart('.$pItem['id'].', 1)" style="width: 100%;">
                                        <i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng
                                    </button>
                                </p>
                              </div>';
                      }
                    ?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
     
<?php 
    require_once('./layouts/footer.php');
?>