<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php

	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
       $delCart = $ct->del_all_data_cart();
       header('Location:success.php');
    }
 
?>
<style type="text/css">
	h2.success_order {
    text-align: center;
    color: red;
}
p.success_note {
    text-align: center;
    padding: 8px;
    font-size: 17px;
}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<h2 class="success_order">Thứ tự thành công</h2>
			<?php
			 $customer_id = Session::get('customer_id');
			 $get_amount = $ct->getAmountPrice($customer_id);
			 if($get_amount){
			 	$amount = 0;
			 	while($result = $get_amount->fetch_assoc()){
			 		$price = $result['price'];
			 		$amount += $price; 

			 	}
			 }
			?>
			<p class="success_note">Tổng giá bạn đã mua từ trang web <?php

			$vat = $amount * 0.1;
			$total = $vat + $amount;
			echo $fm->format_currency($total). ' VNĐ';


			 ?> </p>
			<p class="success_note">Chúng tôi sẽ liên hệ trong thời gian sớm nhất. Vui lòng xem chi tiết đơn hàng của bạn tại đây <a href="orderdetails.php">Nhấp vào đây</a></p>
 		</div>

 	</div>

 </div>
</form>
<?php 
	include 'inc/footer.php';
	
 ?>
