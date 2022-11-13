<?php

include 'lib/session.php';
Session::init();
?>
<?php

include 'lib/database.php';
include 'helpers/format.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});


$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cat = new category();
$cs = new customer();
$product = new product();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>

<head>
    <title>Rewiew Sách</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script type="text/javascript">
    $(document).ready(function($) {
        $('#dc_mega-menu-orange').dcMegaMenu({
            rowItems: '4',
            speed: 'fast',
            effect: 'fade'
        });
    });
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="logo">
                <a href="index.php"><img src="images/logo.jpg" alt="" style="width:160px ;" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form class="form-inline my-2 my-lg-0 " action="search.php" method="post">
                        <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="timkiem" type="submit">Tìm
                            kiếm</button>
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="#" title="View my shopping cart" rel="nofollow"><i
                                class="fa-solid fa-cart-shopping"></i>
                            <span class="cart_title">Giỏ hàng</span>
                            <span class="no_product">

                                <?php
                                $check_cart = $ct->check_cart();
                                if ($check_cart) {
                                    $sum = Session::get("sum");
                                    $qty = Session::get("qty");
                                    echo $fm->format_currency($sum) . ' ' . 'đ' . '-' . 'Hiện có:' . $qty;
                                } else {
                                    echo 'Trống';
                                }

                                ?>

                            </span>
                        </a>
                    </div>
                </div>
                <?php
                if (isset($_GET['customer_id'])) {
                    $customer_id = $_GET['customer_id'];
                    $delCart = $ct->del_all_data_cart();
                    $delCompare = $ct->del_compare($customer_id);
                    Session::destroy();
                }
                ?>
                <div class="login">
                    <?php
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo '<a href="login.php"><i class="fa-solid fa-user"></i> Đăng nhập</a></div>';
                    } else {
                        echo '<a href="?customer_id=' . Session::get('customer_id') . '">Đăng xuất <i class="fa-solid fa-right-to-bracket"></i></a></div>';
                    }
                    ?>


                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <ul class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <ul class="nav nav-pills " role="tablist">
                        <li class=""><a class="nav-link text-white" href="index.php">Trang
                                chủ</a>
                        </li>
                        <?php
                        $check_cart = $ct->check_cart();
                        if ($check_cart == true) {
                            echo '<li class="nav-item"><a class="nav-link text-white" href="cart.php">Giỏ hàng</a></li>';
                        } else {
                            echo '';
                        }
                        ?>
                        <?php
                        $customer_id = Session::get('customer_id');
                        $check_order = $ct->check_order($customer_id);
                        if ($check_order == true) {
                            echo '<li class="nav-item "><a class="nav-link text-white" href="orderdetails.php">Thông tin</a></li>';
                        } else {
                            echo '';
                        }
                        ?>

                        <?php
                        $login_check = Session::get('customer_login');
                        if ($login_check == false) {
                            echo '';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link text-white"  href="profile.php">Hồ sơ cá nhân</a> </li>';
                        }
                        ?>
                        <?php

                        $login_check = Session::get('customer_login');
                        if ($login_check) {
                            echo '<li class="nav-item "><a class="nav-link text-white" href="compare.php">So sánh</a> </li>';
                        }

                        ?>
                        <?php

                        $login_check = Session::get('customer_login');
                        if ($login_check) {
                            echo '<li class=""><a class="nav-link text-white" href="wishlist.php">Danh sách yêu thích</a> </li>';
                        }

                        ?>
                        <!-- // -->
                        <?php

                        $login_check = Session::get('customer_login');
                        if ($login_check) {
                            echo '<li class=""><a class="nav-link text-white" href="http://ct275-baitapnhom.localhost/productbycat.php?catid=18">Sách Tâm Lý</a> </li>';
                        }
                        ?>

                        <?php

                        $login_check = Session::get('customer_login');
                        if ($login_check) {
                            echo '<li class=""><a class="nav-link text-white" href="http://ct275-baitapnhom.localhost/productbycat.php?catid=15">Sách Văn Học</a> </li>';
                        }

                        ?>

                        <?php

                        $login_check = Session::get('customer_login');
                        if ($login_check) {
                            echo '<li class=""><a class="nav-link text-white" href="http://ct275-baitapnhom.localhost/productbycat.php?catid=7">Sách Kỹ Năng</a> </li>';
                        }

                        ?>

                        <?php

                        $login_check = Session::get('customer_login');
                        if ($login_check) {
                            echo '<li class=""><a class="nav-link text-white" href="http://ct275-baitapnhom.localhost/productbycat.php?catid=6">Sách Làm Giàu</a> </li>';
                        }

                        ?>
                    </ul>
            </ul>
        </div>