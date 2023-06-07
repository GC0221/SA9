<?php
include('config.php');

$fp=fopen("c:\\AppServ\\www\\session\\ownerlogin.txt","r");
$sid=fread($fp,1024);
fclose($fp);
session_id($sid);
session_start();

if(isset($_SESSION['owneraccount']) && $_SESSION['owneraccount']="dd@gmail.com") 
{
    echo "仁園業者，張老闆，";
echo $_SESSION['owneraccount'];
echo "已登錄!";
}
else if(isset($_SESSION['owneraccount']) && $_SESSION['owneraccount']="yoyo@gmail.com") {

echo "聖園業者，謝老闆";
echo $_SESSION['owneraccount'];
echo "已登錄!";
}
else 
{
echo "未登錄，無權訪問";
    echo "請<a href=\"user_login.php\">登錄</a>後瀏覽";
        exit();

}

    



?> 

<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>輔仁大學學餐系統(測試版)</title>

<!-- Favicons -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">

<!-- CSS Core -->
<link rel="stylesheet" href="dist/css/core.css" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="dist/css/theme-beige.css" />

</head>

<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div class="module module-logo dark">
                        <a href="index.php">
                            <img src="assets/img/fju_logo.png" alt="" width="88">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->


                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">

                            <li><a href="owner_welcome.php">首頁</a></li>
                            <li><a href="menu_manage.php">菜單管理</a></li> <!--新增，修改，刪除-->
                            <li><a href="order_manage.php">訂單管理</a></li> <!--訂單狀態的 接收訂單，出餐狀態修改，刪除-->
                            <li><a href="sales_report.php">銷售報表</a></li>
                            <li><a href="index.php">登出</a></li>

                        </ul>
                    </nav>


                    <div class="module left">
                        <a href="userlogin/protoptype.php" class="btn btn-outline-secondary"><span>點餐</span></a>

                    </div>
                </div>
<!-- 本次更新為測試用 -->



                <!-- <div class="col-md-2">

                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification">0</span>
                        </span>
                        <span class="cart-value">$<span class="value">0.00</span></span>
                    </a>
                    
                </div> -->

            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <a href="index.php">
                <img src="assets/img/fju_logo.png" alt="">
            </a>
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">0</span>
        </a>

    </header>
    <!-- Header / End -->

    <!-- Content -->
    <div id="content">

        <!-- Section - Main -->



        <table class="table table-sm table-bordered"style="text-align:center;">
    <thead style="text-align:center;">
        <tr style="text-align:center;">
            <th>餐廳名稱 </th>
            <th>餐點名稱</th>
            <th>餐點價位</th>
            <th>供應狀態</th>
            <th>功能選單</th>


        </tr>
    </thead>
    <tbody>

<?php
if ($result) {
    if (mysqli_num_rows($result)>0) {
        foreach($result as $row)
					{
?>
<tr>
								<td><?php echo $row['resturant_name']; ?></td> 
								<td><?php echo $row['food_name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
								<td><?php echo $row['active']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm " href = "">編輯</button>
                                    &nbsp;
                                    <button type="button" class="btn btn-secondary btn-sm " style="margin: 10" onclick="return DeleteCheck();">刪除</button>

                                    <!-- <button type="button" class="btn btn-secondary btn-sm " style="margin: 10" onclick="return DeleteCheck();">刪除</button> -->
                            </td>
								<!-- <td><-?php echo $row['fk_resturant_owner_id']; ?></td> -->
								<!-- <td><-?php echo $row['image_name']; ?></td> -->

                            </tr>

<?php
        }
    }
}
mysqli_free_result($result);
?>





       
        <!-- Section - Menu -->
        <section class="section pb-0 protrude">
            <div class="container">
            </div>

            <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>
             

        </section>

        <footer id="footer" class="bg-dark dark">

            <div class="container">
                <!-- Footer 1st Row -->
                <div class="footer-first-row row">
                    <div class="col-lg-3 text-center">
                        <a href="index.php"><img src="assets/img/fju_logo.png" alt="" width="88" class="mt-5 mb-5"></a>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <h5 class="text-muted mb-3">Social Media</h5>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Footer 2nd Row -->
                <div class="footer-second-row">
                    <span class="text-muted">Copyright SA9 2023©.</span>
                </div>
            </div>

            <!-- Back To Top -->
            <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

        </footer>
        <!-- Footer / End -->

    </div>
    <!-- Content / End -->

    <!-- Panel Cart -->
    <div id="panel-cart">
        <div class="panel-cart-container">
            <div class="panel-cart-title">
                <h5 class="title">Your Cart</h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
            </div>
            <div class="panel-cart-content cart-details">
                <table class="cart-table">
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Beef Burger</a></span>
                            <span class="caption text-muted">Large (500g)</span>
                        </td>
                        <td class="price">$9.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Extra Burger</a></span>
                            <span class="caption text-muted">Small (200g)</span>
                        </td>
                        <td class="price text-success">$9.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                </table>
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-7 text-right text-muted">Order total:</div>
                        <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-7 text-right text-muted">Devliery:</div>
                        <div class="col-5"><strong>$<span class="cart-delivery">0.00</span></strong></div>
                    </div>
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5"><strong>$<span class="cart-total">0.00</span></strong></div>
                    </div>
                </div>
                <div class="cart-empty">
                    <i class="ti ti-shopping-cart"></i>
                    <p>Your cart is empty...</p>
                </div>
            </div>
        </div>
        <a href="checkout.html" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
    </div>

    <!-- Panel Mobile -->
    <nav id="panel-mobile">
        <div class="module module-logo bg-dark dark">
            <a href="#">
                <img src="assets/img/fju_logo.png" alt="" width="88">
            </a>
            <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
        </div>
        <nav class="module module-navigation"></nav>
        <div class="module module-social">
            <h6 class="text-sm mb-3">Follow Us!</h6>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade product-modal" id="product-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-1 product-modal-name">Boscaiola Pasta</h6>
                        <span class="text-muted product-modal-ingredients">Pasta, Cheese, Tomatoes, Olives</span>
                    </div>
                    <div class="col-3 text-lg text-right">$<span class="product-modal-price">9.00</span></div>
                </div>
            </div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / Size -->
                <div class="panel-details panel-details-size">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-sizes-list" data-toggle="collapse">Size</a>
                    </h5>
                    <div id="panel-details-sizes-list" class="collapse show">
                        <div class="panel-details-content">
                            <div class="product-modal-sizes">
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Small - 100g ($9.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Medium - 200g ($14.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Large - 350g ($21.99)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details panel-details-additions">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-additions-content" data-toggle="collapse">Additions</a>
                    </h5>
                    <div id="panel-details-additions-content" class="collapse">
                        <div class="panel-details-content">
                            <!-- Additions List -->
                            <div class="row product-modal-additions">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tomato ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ham ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Chicken ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Cheese($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Bacon ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Other -->
                <div class="panel-details panel-details-form">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_other" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-other" data-toggle="collapse">Other</a>
                    </h5>
                    <div id="panel-details-other" class="collapse">
                        <form action="#">
                            <textarea cols="30" rows="4" class="form-control" placeholder="Put this any other informations..."></textarea>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="add-to-cart"><span>Add to Cart</span></button>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="update-cart"><span>Update</span></button>
        </div>
    </div>
</div>

<!-- Video Modal / Demo -->
<div class="modal modal-video fade" id="modalVideo" role="dialog">
    <button class="close" data-dismiss="modal"><i class="ti ti-close"></i></button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <iframe height="500"></iframe>
        </div>
    </div>
</div>



<!-- Cookies Bar -->
<div id="cookies-bar" class="body-bar cookies-bar">
    <div class="body-bar-container container">
        <div class="body-bar-text">
            <h4 class="mb-2">Cookies</h4>
            <p>We use technical and analytic cookies to ensure that we give you the best experience on our website</p>
        </div>
        <div class="body-bar-action">
            <button class="btn btn-primary" data-accept="cookies"><span>Accept</span></button>
        </div>
    </div>
</div>

<!-- JS Core -->
<script src="dist/js/core.js"></script>

</body>

</html>

<?php






?>