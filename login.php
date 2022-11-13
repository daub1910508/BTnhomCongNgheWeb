<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
$login_check = Session::get('customer_login');
if ($login_check) {
    header('Location:order.php');
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $insertCustomers = $cs->insert_customers($_POST);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $login_Customers = $cs->login_customers($_POST);
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Bài tập 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="login_panel container-fluid" style="width: 31%;">
                <h3>Khách hàng hiện tại</h3>
                <?php
                if (isset($login_Customers)) {
                    echo $login_Customers;
                }
                ?>
                <!--  -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email đăng nhập:</label>
                        <input type="text" name="email" class="form-control" placeholder="Nhập email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật Khẩu:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password"
                            id="pwd">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Ghi nhớ
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
                </form>

            </div>
            <?php

            ?>
            <div class="col-sm-2 col-md-2 col-lg-8">
                <?php
                if (isset($insertCustomers)) {
                    echo $insertCustomers;
                }
                ?>
                <!--  -->
                <div class=" container">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <div class="card" style="width: 128% ">
                                <div class="card-header">
                                    <h3>Đăng ký để xem được nhiều hơn</h3>
                                </div>
                                <div class="card-body">
                                    <form id="signupForm" method="post" class="form-horizontal" action="#">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="name">Tên của bạn;</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Nhập tên của bạn" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="city">Thành phố của
                                                bạn:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="city" name="city"
                                                    placeholder="Nhập thành phố bạn đang sống" />
                                            </div>
                                        </div>
                                        <!-- <div>
                                            <input type="text" name="zipcode" placeholder="Nhập mã Zip...">
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="zipcode">zipcode:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="zipcode" name="zipcode"
                                                    placeholder="Nhập zipcode" />
                                            </div>
                                        </div>
                                        <!-- <div>
                                            <input type="text" name="email" placeholder="Nhập Email...">
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="email">Email:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Email của bạn" />
                                            </div>
                                        </div>
                                        <!-- <div>
                                            <input type="text" name="address" placeholder="Nhập địa chỉ...">
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="address">Địa chỉ:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="Nhập địa chỉ" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="country">Thành phố:</label>
                                            <div class="col-sm-5">
                                                <select type="text" class="form-control" placeholder="Nhập thành phố"
                                                    id="country" name="country" onchange="change_country(this.value)"
                                                    class="form-select" aria-label="Default select example">
                                                    <option selected>Chọn nơi sinh sống</option>
                                                    <option value="hcm">TP. Hồ Chí Minh</option>
                                                    <option value="ct">TP. Cần Thơ</option>
                                                    <option value="ag">An Giang</option>
                                                    <option value="dt">Đồng Tháp</option>
                                                    <option value="vl">Vĩnh Long</option>
                                                    <option value="hg">Hậu Giang</option>
                                                    <option value="la">Long An</option>
                                                    <option value="tg">Tiền Giang</option>
                                                    <option value="cm">Cà Mau</option>
                                                    <option value="bc">Bến Tre</option>
                                                    <option value="tv">Trà Vinh</option>
                                                    <option value="bl">Bạc Liêu</option>
                                                    <option value="kg">Kiên Giang</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="phone">Số điện thoại: </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="Nhập số điện thoại" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="password">Mật khẩu:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="password" name="password"
                                                    placeholder="Nhập mật khẩu" />
                                            </div>
                                        </div>
                                        <div class="form-group form-check">
                                            <div class="col-sm-5 offset-sm-4">
                                                <input class="form-check-input" type="checkbox" id="agree" name="agree"
                                                    value="agree" />
                                                <label class="form-check-label" for="agree">Đồng ý các quy định của
                                                    chúng
                                                    tôi</label>
                                            </div>
                                        </div>
                                        <div class="row" class="search">
                                            <div class="col-sm-5 offset-sm-4">
                                                <button type="submit" class="btn btn-primary" name=" submit"
                                                    value="Tạo tài khoản">Tạo tài khoản</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div> <!-- Cột nội dung -->
                    </div> <!-- Dòng nội dung -->
                </div> <!-- Container -->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script type="text/javascript" src="./js/jquery.validate.js"></script>

                <script type="text/javascript">
                // $.validator.setDefaults({
                //     submitHandler: function() {
                //         alert("Bạn đồng ý!");
                //     }
                // });
                $(document).ready(function() {
                    $("#signupForm").validate({
                        rules: {
                            name: "required",
                            city: "required",
                            zipcode: "required",
                            country: "required",
                            phone: "required",
                            address: "required",
                            password: {
                                required: true,
                                minlength: 5
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            agree: "required"
                        },
                        messages: {
                            name: "Bạn chưa nhập vào họ của bạn",
                            city: "Bạn chưa nhập thành phố của bạn",
                            zipcode: "Bạn chưa nhập zipcode",
                            country: "Bạn chưa nhập Thành Phố",
                            phone: "Bạn chưa nhập số điện thoại",
                            address: "Bạn chưa nhập địa chỉ",
                            password: {
                                required: "Bạn chưa nhập mật khẩu",
                                minlength: "Mật khẩu phải có ít nhất 5 ký tự"
                            },
                            email: "Hộp thư điên tử không hợp lệ",
                            agree: "Bạn phải đồng ý với các qui định của chúng tôi"
                        },
                        ErrorElement: "div",
                        ErrorPlacement: function(error, element) {
                            error.addClass("invalid-feedback");
                            if (element.prop("type") === "checkbox") {
                                error.inserAfter(element.siblings("label"));
                            } else {
                                error.inserAfter(element);
                            }
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass("is-invalid").removeClass("is-valid");
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).addClass("is-valid").removeClass("is-invalid");
                        }
                    });
                });
                </script>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>

</html>

<?php
include 'inc/footer.php';

?>