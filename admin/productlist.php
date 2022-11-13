<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pd = new product();
	$fm = new Format();
	if(isset($_GET['productid'])){
        $id = $_GET['productid']; 
        $delpro = $pd->del_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">
            <?php
        if(isset($delpro)){
        	echo $delpro;
        }
        ?>

            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Gía sản phẩm</th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Loại</th>
                        <th>Nhãn hiệu</th>
                        <th>Mô tả</th>
                        <th>Loại hình</th>
                        <th>Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
			
				$pdlist = $pd->show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['price'] ?></td>
                        <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
                        <td><?php echo $result['catName'] ?></td>
                        <td><?php echo $result['brandName'] ?></td>
                        <td><?php 

					echo $fm->textShorten($result['product_desc'], 20);

					 ?></td>
                        <td><?php 
						if($result['type']==0){
							echo 'Hoạt Động';
						}else{
							echo 'Không Hoạt Động';
						}

					?></td>

                        <td><a href="productedit.php?productid=<?php echo $result['productId'] ?>"
                                class="btn btn-xs btn-warning">
                                <i alt="Edit" class="fa fa-pencil"> Sửa</i></a> ||
                            <a href="?productid=<?php echo $result['productId'] ?>" class="btn btn-xs btn-danger"
                                name="delete-contact">
                                <i alt="Delete" class="fa fa-trash"> Xóa</i>
                        </td>
                    </tr>
                    <?php
					}
				}
				?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>