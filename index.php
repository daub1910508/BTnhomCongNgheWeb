<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <title>Review Sách</title>
</head>

<body>
    <div class='lentop'>
        <div>
            <img
                src='https://1.bp.blogspot.com/-k6sikOdzFXQ/VwqCKDosmEI/AAAAAAAAKxE/nLxLhkTIO6o3iE5ZWmtxo2bf4QHdzPQNQ/s1600/top.png' />
        </div>
    </div>
    <style>
    .lentop {
        display: none;
        bottom: 40%;
        right: 10px;
        cursor: pointer;
        position: fixed;
        z-index: 1000;
    }

    .lentop div {
        background: crimson;
        border: 2px solid #fff;
        border-radius: 45px;
        padding: 11px 12.5px;
        box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.3)
    }

    .lentop img {
        width: 16px;
        height: 16px;
    }

    .bg-dark {
        position: fixed;
        z-index: 1030;
        /* background-color: #616161 !important; */
    }
    </style>
    <script>
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) $(".lentop").fadeIn();
            else $(".lentop").fadeOut();
            ttt
        });
        $(".lentop").click(function() {
            $("body,html").animate({
                scrollTop: 0
            }, "slow");
        });
    });
    </script>
</body>

</html>
<?php  
include 'inc/header.php';
include 'inc/slider.php';
?>
<div class="container-fluid">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
	      		$product_feathered = $product->getproduct_feathered();
	      		if($product_feathered){
	      			while($result = $product_feathered->fetch_assoc()){

	      	?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" width="150px"
                        alt="" /></a>
                <h2><?php echo $result['productName'] ?></h2>
                <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
                <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span></p>
                <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>"
                            class="details">Xem chi tiết</a></span></div>
            </div>
            <?php
				}
			}
				?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm mới</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
	      		$product_new = $product->getproduct_new();
	      		if($product_new){
	      			while($result_new = $product_new->fetch_assoc()){

	      		?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" width="150px"
                        alt="" /></a>
                <h2><?php echo $result_new['productName'] ?></h2>
                <p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p>
                <p><span class="price"><?php echo $fm->format_currency($result_new['price'])." "."VNĐ" ?></span></p>
                <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>"
                            class="details">Xem chi tiết</a></span></div>
            </div>

            <?php
				}
			}
				?>
        </div>
    </div>
</div>

<?php 
	include 'inc/footer.php';
	
 ?>